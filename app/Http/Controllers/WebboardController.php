<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use App\Models\Post;
use App\Models\PostComment;
use App\Models\PostLike;
use App\Models\TokenLine;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator as PaginationPaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WebboardController extends Controller
{
    public function webboard_view(Request $request)
    {
        // dd($request->all());
        $search = $request->search_post;
        PaginationPaginator::useBootstrap();
        $posts = DB::table('post')
            ->leftJoin('users', 'post.post_by', '=', 'users.id')
            ->when($search, function ($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('post.title', 'like', '%' . $search . '%')
                        ->orWhere('post.hastag', 'like', '%' . $search . '%');
                });
            })
            ->select('users.name', 'users.lastname', 'users.imgprofile', 'post.*')
            ->orderBy('post.created_at', 'DESC')
            ->paginate(3);
        $posts->appends(['search_post' => $search]);
        return view('webboard.webboard-view', compact('posts', 'search'));
    }

    public function webborad_post(Request $request)
    {
        // dd($request->all());

        if ($request->has('post_image')) {
            $file_imgpost = $request->file('post_image');
            $filename_post = 'post' . time() . '_' . $file_imgpost->getClientOriginalName();
            $file_imgpost->move(public_path('assets/imgpost'), $filename_post);

            $post = new Post([
                'title' => $request->input('title'),
                'content' => $request->input('content_post'),
                'hastag' => $request->input('hastag'),
                'image' => $filename_post,
                'post_by' => Auth::user()->id
            ]);
            $post->save();
        } else {
            $post = new Post([
                'title' => $request->input('title'),
                'content' => $request->input('content_post'),
                'hastag' => $request->input('hastag'),
                'post_by' => Auth::user()->id,
                'image' => null
            ]);
            $post->save();
        }
        $data['success'] = 'โพสต์สำเร็จ';
        return redirect()->route('webboard_view')->with('success', 'โพสต์สำเร็จ');
    }

    public function webboard_in($id)
    {
        PaginationPaginator::useBootstrap();
        $post = DB::table('post')
            ->where('post.id', $id)
            ->leftJoin('users', 'post.post_by', '=', 'users.id')
            ->select('users.name', 'users.lastname', 'users.imgprofile', 'post.*')
            ->first();

        $comment = DB::table('post_comment')
            ->leftJoin('users', 'post_comment.comment_by', '=', 'users.id')
            ->where('post_comment.post_id', $id)
            ->orderBy('post_comment.updated_at', 'DESC')
            ->select('post_comment.*', 'users.name', 'users.lastname', 'users.imgprofile')
            ->paginate(3);

        // dd($comment);

        return view('webboard.webboard-in', compact('post', 'comment'));
    }

    public function increment_post(Request $request)
    {
        $idpost = $request->idpost;
        $increment_view = Post::where('id', $idpost)->increment('numview');

        $postview = [
            'res_code' => 'success',
            'massege' => 'เพิ่ม view สำเร็จ',
            'idpost' => $idpost
        ];

        return response()->json($postview);
    }

    public function comment(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $commenmt = new PostComment([
            'content' => $data['content'],
            'post_id' => $data['post_id'],
            'comment_by' => $data['comment_by'],
        ]);
        $commenmt->save();
        $increment_numcomment = Post::where('id', $data['post_id'])->increment('numcomment');

        // แจ้งเตือนไลน์
        //1. เช็ค token user
        $post = Post::find($data['post_id']);
        $user = User::find($post->post_by);
        $token = TokenLine::where('user_id', $user->id)->first();
        // 2.เงื่อนไข
        $condition1 = $token->status_token == 'on';
        $condition2 = $token != null;
        $condition3 = $user->id != Auth::user()->id;

        if ($condition1 &&  $condition2 &&  $condition3) {
            //บันทึกลงตาราง notify
            $notify = new Notify([
                'type_notify' => 'web',
                'web_id' => $data['post_id'],
                'faq_id' => null,
                'text_detail' => 'ได้แสดงความคิดเห็นกระทู้ของคุณ',
                'user_send_id' => Auth::user()->id,
                'to_user_id' =>  $user->id,
                'to_admin_type' => null,
                'to_user_id_read' => 'new',
                'to_admin_type_read' => null
            ]);
            $notify->save();



            $url        = 'https://notify-api.line.me/api/notify';
            $token      = $token->token_text;
            $headers    = [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $token
            ];
            $fields     = 'message=' . Auth::user()->name . ' ได้แสดงความคิดเห็นกระทู้ของคุณ เรื่อง ' . $post->title;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            var_dump($result);
            $result = json_decode($result, TRUE);
        }

        return redirect()->back()->with('success_comment', 'คอมเม้นกระทู้แล้ว');
    }

    public function edit_comment(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $updatecomment = PostComment::find($data['edit_comment_id'])->update([
            'content' => $data['edit_comment_content'],
        ]);
        return redirect()->back()->with('success-editcomment', 'ความคิดเห็นถูกแก้ไขแล้ว');
    }

    public function delete_comment(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $deletecomment = PostComment::find($data['id_comment'])->delete();
        $decrement_numcomment = Post::where('id', $data['id_post'])->decrement('numcomment');
        return response()->json(
            [
                'status' => 200,
                'message' => 'ลบความคิดเห็นสำเร็จ'
            ]
        );
    }

    public function webboard_like(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        // แจ้งเตือนไลน์
        //1. เช็ค token user
        $post = Post::find($data['id_post']);
        $user = User::find($post->post_by);
        $token = TokenLine::where('user_id', $user->id)->first();
        // 2.ข้อมูลว่าเคยกดไลค์ยัง
        $checklike = PostLike::where('like_by', Auth::user()->id)
            ->where('post_id', $data['id_post'])
            ->first();
        // 3.เงื่อนไข
        $condition1 = $token->status_token == 'on';
        $condition2 = $token != null;
        $condition3 = $user->id != Auth::user()->id;
        $condition4 = $checklike == null;

        if ($condition1 && $condition2 && $condition3 && $condition4) {
            $url        = 'https://notify-api.line.me/api/notify';
            $token      = $token->token_text;
            $headers    = [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $token
            ];
            $fields     = 'message=' . Auth::user()->name . ' ได้ถูกใจกระทู้ของคุณ เรื่อง ' . $post->title;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);

            $notify = new Notify([
                'type_notify' => 'web',
                'web_id' => $data['id_post'],
                'faq_id' => null,
                'text_detail' => 'ได้ถูกใจกระทู้ของคุณ',
                'user_send_id' => Auth::user()->id,
                'to_user_id' =>  $user->id,
                'to_admin_type' => null,
                'to_user_id_read' => 'new',
                'to_admin_type_read' => null
            ]);
            $notify->save();
        }

        // บันทึกไลค์
        if ($data['status'] == "notready") {
            DB::table('post')->where('id', $data['id_post'])->increment('numlike');
            $likepost = PostLike::updateOrCreate(
                [
                    'like_by' => $data['like_by'],
                    'post_id' => $data['id_post'],
                ],
                [
                    'status_like' => 'ready',
                ]
            );
            $numlike = Post::find($data['id_post'])->numlike;
            $newstatus = $likepost->status_like;
            $message = 'เพิ่มไลค์แล้ว';
        } else {
            DB::table('post')->where('id', $data['id_post'])->decrement('numlike');
            $likepost = PostLike::updateOrCreate(
                [
                    'like_by' => $data['like_by'],
                    'post_id' => $data['id_post'],
                ],
                [
                    'status_like' => 'notready',
                ]
            );
            $numlike = Post::find($data['id_post'])->numlike;
            $newstatus = $likepost->status_like;
            $message = 'ลดไลค์แล้ว';
        }

        return response()->json(
            [
                'status' => 200,
                'message' => $message,
                'newstatus' => $newstatus,
                'numlike' => $numlike
            ]
        );
    }

    public function webboard_my(Request $request)
    {
        PaginationPaginator::useBootstrap();
        $value_search = $request->mypost_search;
        $iduser_post =  Auth::user()->id;
        $myposts = DB::table('post')
            ->when($iduser_post, function ($query) use ($iduser_post) {
                return $query->where('post_by', $iduser_post);
            })
            ->when($value_search, function ($query) use ($value_search) {
                return $query->where('title', 'LIKE', '%' . $value_search . '%')
                    ->orwhere('hastag', 'LIKE', '%' . $value_search . '%');
            })
            ->orderBy('created_at', 'DESC')
            ->paginate(3);
        // ->get();
        // dd($myposts);
        $myposts->appends(['mypost_search' => $value_search]);

        // dd($myposts);
        return view('webboard.webboard-my', compact('myposts', 'value_search'));
    }

    public function webboard_my_edit(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        $request->validate([
            'title' => 'required',
            'content_post' => 'required',
        ], [
            'title.required' => 'คุณจำเป็นต้องกรอกชื่อเรื่อง',
            'content_post.required' => 'คุณจำเป็นต้องกรอกข้อความ',
        ]);

        if ($request->has('post_image')) {
            // นำภาพลง folder
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($data['post_image']->getClientOriginalExtension());
            $img_postname = $name_gen . '.' . $img_ext;
            $upload_location = 'assets/imgpost/';
            $data['post_image']->move($upload_location, $img_postname);
            // นำภาพลง folder

            // ลบภาพเดิม
            if (file_exists($upload_location . $data['old_img_post'])) {
                if ($data['old_img_post'] != null) {
                    unlink($upload_location .  $data['old_img_post']);
                }
            }
            //ลบภาพเดิม

            Post::where('id',  $data['id_post'])->update([
                'title' => $data['title'],
                'content' => $data['content_post'],
                'image' => $img_postname,
                'hastag' => $data['hastag'],
            ]);
        } else {
            Post::where('id',  $data['id_post'])->update([
                'title' => $data['title'],
                'content' => $data['content_post'],
                'image' => $data['old_img_post'],
                'hastag' => $data['hastag'],
            ]);
        }

        return redirect()->back()->with('success_edit_post', 'แก้ไขกระทู้สำเร็จ');
    }


    public function  webboard_my_delete($id_post)
    {
        // dd($id_post);

        $post = Post::find($id_post);
        $imgname = $post->image;
        $location_path = 'assets/imgpost/';

        // dd($imgname);

        if (file_exists($location_path . $imgname)) {
            if ($imgname != '') {
                unlink($location_path . $imgname);
            }
        }

        // ลบคนที่ถูกใจ
        $like = Db::table('post_like')->where('post_id', $id_post);
        $like->delete();
        // ลบคนที่คอมเม้น
        $comment = Db::table('post_comment')->where('post_id', $id_post);
        $comment->delete();
        $post->delete();

        return redirect()->back()->with('success-delete-post', 'ลบกระทู้สำเร็จ');
    }

    public function webboard_my_like(Request $request)
    {
        PaginationPaginator::useBootstrap();
        $value_search = $request->mylike_post_search;
        $id_post_like = PostLike::select('post_id')->where('like_by', Auth::user()->id)->where('status_like', 'ready')
            ->distinct()->pluck('post_id');
        // dd($id_post_like);

        $mylike_post = DB::table('post')
            ->leftJoin('post_like', 'post.id', '=', 'post_like.post_id')
            ->leftJoin('users', 'post.post_by', '=', 'users.id')
            ->when($id_post_like, function ($query) use ($id_post_like) {
                return $query->whereIn('post.id', $id_post_like);
            })
            ->when($value_search, function ($query) use ($value_search) {
                return $query->where('post.title', 'LIKE', '%' . $value_search . '%')
                    ->orwhere('post.hastag', 'LIKE', '%' . $value_search . '%');
            })
            ->select('post.*', 'users.name', 'users.lastname', 'users.imgprofile')
            ->orderBy('post_like.created_at', 'DESC')
            ->distinct()
            ->paginate(3);
        // ->get();
        // dd($mylike_post);

        $mylike_post->appends(['mypost_search' => $value_search]);


        return view('webboard.webboard-my-like', compact('mylike_post', 'value_search'));
    }

    public function webboard_my_comment(Request $request)
    {
        $search_mycomment = $request->mycomment_search;
        PaginationPaginator::useBootstrap();

        $id_mycomment = PostComment::select('post_id')->where('comment_by', '=', Auth::user()->id)
            ->distinct()->pluck('post_id');
        // dd($id_mycomment);

        $mycomment_post = DB::table('post')
            ->leftJoin('users', 'post.post_by', '=', 'users.id')
            ->leftJoin('post_comment', 'post.id', '=', 'post_comment.post_id')
            ->whereIn('post.id', $id_mycomment)
            ->when($search_mycomment, function ($query, $search_mycomment) {
                return $query->where(function ($innerQuery) use ($search_mycomment) {
                    $innerQuery
                        ->where('post.title', 'like', '%' . $search_mycomment . '%')
                        ->orWhere('post.hastag', 'like', '%' . $search_mycomment . '%');
                });
            })
            ->groupBy('post.id', 'post.title', 'post.content', 'post.image', 'post.hastag', 'post.numlike', 'post.numview', 'post.numcomment', 'post.post_by', 'post.created_at', 'users.name', 'post.updated_at', 'users.lastname', 'users.imgprofile')
            ->select('post.id', 'post.title', 'post.content', 'post.image', 'post.hastag', 'post.numlike', 'post.numview', 'post.numcomment', 'post.post_by', 'post.created_at', 'users.name', 'post.updated_at', 'users.lastname', 'users.imgprofile')
            ->orderBy('post_comment.created_at', 'DESC')
            ->paginate(3);

        // dd($mycomment_post);


        return view('webboard.webboard-my-comment', compact('search_mycomment', 'mycomment_post'));
    }
}
