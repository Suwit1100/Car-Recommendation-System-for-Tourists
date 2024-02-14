<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqReply;
use App\Models\Notify;
use App\Models\TokenLine;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\PaginationState;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator as PaginationPaginator;

class FAQUserController extends Controller
{
    public function faq_view(Request $request)
    {
        PaginationPaginator::useBootstrap();
        // dd($request->all());
        $search_main = $request->search_main;
        $search_new = $request->search_new;
        $search_send = $request->search_send;
        $sort_main = $request->sort_main;
        $sort_new = $request->sort_new;
        $sort_send = $request->sort_send;

        // ส่งไปหน้า view เวลาค้นหาไม่เด้งไปแทบอื่น
        $check_tap = '';
        if ($request->has('search_main')) {
            $check_tap = 'search_main';
        } else if ($request->has('search_new')) {
            $check_tap = 'search_new';
        } else if ($request->has('search_send')) {
            $check_tap = 'search_send';
        }

        $faq = DB::table('faq')
            ->leftJoin('users', 'faq.letter_by', '=', 'users.id')
            ->leftJoin('faq_reply', function ($join) {
                $join->on('faq.id', '=', 'faq_reply.letter_id')
                    ->where('faq_reply.created_at', '=', DB::raw('(SELECT MAX(created_at) FROM faq_reply WHERE faq_reply.letter_id = faq.id)'));
            })
            ->where('faq.letter_by', Auth::user()->id)
            ->where('faq.toUserId', Auth::user()->id)
            ->where('faq.deleteUser', 'not_delete')
            ->when($search_main, function ($query, $search_main) {
                return $query->where('faq.title', 'like', '%' . $search_main . '%');
            })
            ->when($sort_main, function ($query, $sort_main) {
                return $query->orderBy('faq.created_at', $sort_main);
            })
            ->select('faq.*', 'users.name', 'users.lastname', 'faq_reply.content AS replyContent', 'faq_reply.reply_by AS reply_by', 'faq_reply.created_at AS reply_create')
            ->paginate(5);

        $faqsend = DB::table('faq')
            ->leftJoin('users', 'faq.letter_by', '=', 'users.id')
            ->leftJoin('faq_reply', function ($join) {
                $join->on('faq.id', '=', 'faq_reply.letter_id')
                    ->where('faq_reply.created_at', '=', DB::raw('(SELECT MAX(created_at) FROM faq_reply WHERE faq_reply.letter_id = faq.id)'));
            })
            ->where('faq.letter_by', Auth::user()->id)
            ->where('faq.toUserId', Auth::user()->id)
            ->where('faq.deleteUser', 'not_delete')
            ->where('faq.statusUser', 'send')
            ->when($search_send, function ($query, $search_send) {
                return $query->where('faq.title', 'like', '%' . $search_send . '%');
            })
            ->when($sort_send, function ($query, $sort_send) {
                return $query->orderBy('faq.created_at', $sort_send);
            })
            ->select('faq.*', 'users.name', 'users.lastname', 'faq_reply.content AS replyContent', 'faq_reply.reply_by AS reply_by', 'faq_reply.created_at AS reply_create')
            ->paginate(5);

        $faqnew = DB::table('faq')
            ->leftJoin('users', 'faq.letter_by', '=', 'users.id')
            ->leftJoin('faq_reply', function ($join) {
                $join->on('faq.id', '=', 'faq_reply.letter_id')
                    ->where('faq_reply.created_at', '=', DB::raw('(SELECT MAX(created_at) FROM faq_reply WHERE faq_reply.letter_id = faq.id)'));
            })
            ->where('faq.letter_by', Auth::user()->id)
            ->where('faq.toUserId', Auth::user()->id)
            ->where('faq.deleteUser', 'not_delete')
            ->where('faq.statusUser', 'new')
            ->when($search_new, function ($query, $search_new) {
                return $query->where('faq.title', 'like', '%' . $search_new . '%');
            })
            ->when($sort_new, function ($query, $sort_new) {
                return $query->orderBy('faq.created_at', $sort_new);
            })
            ->select('faq.*', 'users.name', 'users.lastname', 'faq_reply.content AS replyContent', 'faq_reply.reply_by AS reply_by', 'faq_reply.created_at AS reply_create')
            ->paginate(5);

        $faq->appends(['search_main' => $search_main, 'sort_main' => $sort_main]);
        $faqnew->appends(['search_new' => $search_new, 'sort_new' => $sort_new]);
        $faqsend->appends(['search_send' => $search_send, 'sort_send' => $sort_send]);
        // dd($faq);

        return view('user.faq.faq-view', compact('faq', 'faqnew', 'faqsend', 'search_main', 'search_new', 'search_send', 'check_tap', 'sort_main', 'sort_new', 'sort_send'));
    }

    public function faq_post(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        if ($request->has('fileimg')) {
            $fileimg = $request->file('fileimg');
            $fileimgname = 'faq' . time() . '_' . $fileimg->getClientOriginalName();
            $fileimg->move(public_path('assets/imgfaq'), $fileimgname);
        }

        $faqnew = Faq::create([
            'letter_by' => Auth::user()->id,
            'title' => $data['title'],
            'content' => $data['content'],
            'imgfile' => $request->has('fileimg') ? $fileimgname : '',
            'toAdminType' => 1,
            'toUserId' => Auth::user()->id,
            'statusUser' => 'send',
            'statusAdmin' => 'new',
        ]);


        $reply_new = FaqReply::create([
            'letter_id' => $faqnew->id,
            'content' => $data['content'],
            'imgfile' => $request->has('fileimg') ? $fileimgname : '',
            'reply_by' => Auth::user()->id,
            'check_first' => 'first'
        ]);

        // แจ้งเตือนไปยังแอดมิน
        //1. ดึงข้อมูล
        $faqcheck = Faq::find($faqnew->id);
        $tokencheck = TokenLine::where('user_type', 1)
            ->where('status_token', 'on')
            ->get();
        // // 3.เงื่อนไข

        // บันทึก notify
        Notify::create([
            'type_notify' => 'faq',
            'web_id' => null,
            'faq_id' => $faqnew->id,
            'text_detail' => 'ได้ส่งข้อความถึงคุณ',
            'user_send_id' => Auth::user()->id,
            'to_user_id' => null,
            'to_admin_type' => 1,
            'to_user_id_read' => null,
            'to_admin_type_read' => 'new'
        ]);

        foreach ($tokencheck as $key => $itokencheck) {
            $url        = 'https://notify-api.line.me/api/notify';
            $token      = $itokencheck->token_text;
            $headers    = [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $token
            ];
            $fields     = 'message=' . Auth::user()->name . ' ได้ส่งคำขอช่วยเหลือถึงคุณ เรื่อง ' . $faqcheck->title;
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

        return redirect()->back()->with('success-letter-post', 'ส่งข้อความสำเร็จ');
    }

    public function faq_read(Request $request)
    {
        // dd($request->all());
        $id = $request->idLetter;
        $faq = FAQ::find($id);

        // check ว่ามันเป็น reply ป่าว
        if ($faq->statusUser == 'new') {
            $faq->update([
                'statusUser' => 'read',
            ]);
        }

        return response()->json(
            [
                'status' => '200',
                'id' => $id
            ]
        );
    }


    public function faq_delete(Request $request)
    {
        // dd($request->all());
        $id = $request->idLetter;
        $faq = FAQ::find($id);
        $faq->update([
            'deleteUser' => 'delete',
        ]);

        // check ถ้า แอดมิน กับ user ลบทั้งสอง 
        if ($faq->deleteAdmin == 'delete' && $faq->deleteUser == 'delete') {

            $imgname = $faq->imgfile;
            $location_path = 'assets/imgfaq/';
            if (file_exists($location_path . $imgname)) {
                if ($imgname != '') {
                    unlink($location_path . $imgname);
                }
            }

            $faq_reply = DB::table('faq_reply')
                ->where('letter_id', $faq->id)
                ->get();
            // dd($faq_reply);

            $imgreply = [];
            foreach ($faq_reply as $ifaq_reply) {
                $imgreply[] = $ifaq_reply->imgfile;
            }
            // dd($imgreply);

            $location_path = 'assets/imgfaq/';
            foreach ($imgreply as $imageReply) {
                $filePath = $location_path . $imageReply;
                // dd($imageName);
                if (file_exists($filePath)) {
                    if ($filePath != 'assets/imgfaq/' && $filePath != 'assets/imgfaq/' . $faq->imgfile) {
                        unlink($filePath);
                    }
                }
            }
            // ลบ reply
            DB::table('faq_reply')
                ->where('letter_id', $faq->id)
                ->delete();
            $faq->delete();
        }

        return response()->json(['status' => 200, 'message' => 'ลบข้อมูลสำเร็จ']);
    }

    public function faq_in($idLetter)
    {

        // dd($idLetter);
        PaginationPaginator::useBootstrap();

        $letter_title = DB::table('faq')->where('id', $idLetter)->first();
        // dd($letter_title->title);

        $letter_main = DB::table('faq_reply')
            ->leftJoin('faq', 'faq_reply.letter_id', '=', 'faq.id')
            ->leftJoin('users', 'faq_reply.reply_by', '=', 'users.id')
            ->where('faq.id', $idLetter)
            ->where('faq_reply.check_first', 'first')
            ->select('faq_reply.*', 'users.name', 'users.lastname', 'users.imgprofile')
            ->first();
        // dd($letter_main);

        $letter_reply = DB::table('faq_reply')
            ->leftJoin('faq', 'faq_reply.letter_id', '=', 'faq.id')
            ->leftJoin('users', 'faq_reply.reply_by', '=', 'users.id')
            ->where('faq.id', $idLetter)
            ->where('faq_reply.check_first', 'no')
            ->select('faq_reply.*', 'users.name', 'users.lastname', 'users.imgprofile', 'users.id AS user_id')
            ->orderBy('faq_reply.created_at', 'ASC')
            ->paginate(3);
        // dd($letter_reply);

        return view('user.faq.faq-in', compact('letter_title', 'letter_main', 'letter_reply'));
    }

    public function faq_reply_post(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        // แจ้งเตือนไปยังแอดมิน
        //1. ดึงข้อมูล
        $faqcheck = Faq::find($data['letter_id']);
        $tokencheck = TokenLine::where('user_type', 1)
            ->where('status_token', 'on')
            ->get();
        // // 3.เงื่อนไข
        foreach ($tokencheck as $key => $itokencheck) {
            $url        = 'https://notify-api.line.me/api/notify';
            $token      = $itokencheck->token_text;
            $headers    = [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $token
            ];
            $fields     = 'message=' . Auth::user()->name . ' ได้ส่งคำขอช่วยเหลือถึงคุณ เรื่อง ' . $faqcheck->title;
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

        if ($request->has('img-reply')) {
            $fileimg = $request->file('img-reply');
            $fileimgname = 'faq_reply' . time() . '_' . $fileimg->getClientOriginalName();
            $fileimg->move(public_path('assets/imgfaq'), $fileimgname);
        }

        $reply_new = FaqReply::create([
            'letter_id' => $data['letter_id'],
            'content' => $data['text-reply'],
            'imgfile' => $request->has('img-reply') ? $fileimgname : '',
            'reply_by' => Auth::user()->id,
        ]);

        // อัปเดตสถานะข้อความ
        $faq = FAQ::find($data['letter_id'])
            ->update([
                'statusUser' => 'send',
                'statusAdmin' => 'new',
            ]);

        //บันทึก Notify
        Notify::create([
            'type_notify' => 'faq',
            'web_id' => null,
            'faq_id' => $data['letter_id'],
            'text_detail' => 'ได้ตอบกลับข้อความ',
            'user_send_id' => Auth::user()->id,
            'to_user_id' =>  null,
            'to_admin_type' => 1,
            'to_user_id_read' => 'read',
            'to_admin_type_read' => 'new'
        ]);

        return redirect()->back()->with('success-reply', 'ตอบกลับสำเร็จ');
    }
}
