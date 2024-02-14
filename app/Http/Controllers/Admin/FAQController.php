<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\FaqReply;
use App\Models\Notify;
use App\Models\TokenLine;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator as PaginationPaginator;

use function Laravel\Prompts\table;

class FAQController extends Controller
{
    public function faq_view_am(Request $request)
    {
        $titlesearch = '';
        $valuesearch = '';
        if ($request->has('faqreply')) {
            $titlesearch = 'faqreply';
            $valuesearch = $request->faqreply;
            // dd(1111111111);
        } else if ($request->has('faq')) {
            // dd(22222222);
            $titlesearch = 'faq';
            $valuesearch = $request->faq;
        } else if ($request->has('announce')) {
            $titlesearch = 'announce';
            $valuesearch = $request->announce;
        }

        $faq_count = Faq::where('toAdminType', '1')->where('statusAdmin', 'new')->get();
        $faq = Faq::where('toAdminType', '1')->where('deleteAdmin', 'not_delete')->get();
        // dd($faq);

        $faq_reply = Faq::where('statusAdmin', 'send')->where('deleteAdmin', 'not_delete')->get();
        $faq_new = Faq::where('statusAdmin', 'new')->where('deleteAdmin', 'not_delete')->get();




        return view('admin.faq.faq-view', compact('titlesearch', 'valuesearch',  'faq', 'faq_count', 'faq_reply', 'faq_new'));
    }

    public function faq_read_am(Request $request)
    {
        // dd($request->all());
        $id = $request->idLetter;
        $faq = FAQ::find($id);

        // check ว่ามันเป็น reply ป่าว
        if ($faq->statusAdmin == 'new') {
            $faq->update([
                'statusAdmin' => 'read',
            ]);
        }

        return response()->json(
            [
                'status' => '200',
                'id' => $id
            ]
        );
    }


    public function faq_delete_am(Request $request)
    {
        // dd($request->all());
        $id = $request->idLetter;
        $faq = FAQ::find($id);
        $faq->update([
            'deleteAdmin' => 'delete',
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

    public function faq_in_am($idLetter)
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

        return view('admin.faq.faq-in', compact('letter_title', 'letter_main', 'letter_reply'));
    }

    public function faq_reply_post_am(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        // แจ้งเตือนไลน์
        $faqcheck = DB::table('faq')->where('id', $data['letter_id'])->first();
        $user = DB::table('users')->where('id', $faqcheck->toUserId)->first();
        $token = TokenLine::where('user_id', $user->id)->first();
        // 2.เงื่อนไข
        $condition2 = $token != null;
        $condition1 = $token ? $token->status_token == 'on' : '';
        $condition3 = $user->id != Auth::user()->id;

        if ($condition1 &&  $condition2 &&  $condition3) {
            //บันทึกลงตาราง notify
            $url        = 'https://notify-api.line.me/api/notify';
            $token      = $token->token_text;
            $headers    = [
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer ' . $token
            ];
            $fields     = 'message=' . Auth::user()->name . ' ได้ส่งตอบกลับข้อความของคุณ เรื่อง ' . $faqcheck->title;
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

        //บันทึก Notify
        $notify = Notify::create([
            'type_notify' => 'faq',
            'web_id' => null,
            'faq_id' => $data['letter_id'],
            'text_detail' => 'ได้ตอบกลับข้อความของคุณ',
            'user_send_id' => Auth::user()->id,
            'to_user_id' =>  $user->id,
            'to_admin_type' => null,
            'to_user_id_read' => 'new',
            'to_admin_type_read' => null
        ]);

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
                'statusUser' => 'new',
                'statusAdmin' => 'send',
            ]);

        return redirect()->back()->with('success-reply', 'ตอบกลับสำเร็จ');
    }
}
