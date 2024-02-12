<?php

namespace App\Http\Controllers;

use App\Models\Notify;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function read_notify_user(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

        Notify::find($data['noti_id'])
            ->update(['to_user_id_read' => 'read']);

        $href = '';
        if ($data['faq_id'] != null) {
            $href = '/faquser/faq_in/' . $data['faq_id'];
        } else {
            $href = '/webboard/webborad_in/' . $data['web_id'];
        }

        return response()->json(
            [
                'status' => 200,
                'message' => 'อัปเดตการอ่านสำเร็จ',
                'href' => $href,
            ]
        );
    }

    public function read_notify_admin(Request $request)
    {
        // dd($request->all());
        $data = $request->all();


        $href = '';
        if ($data['faq_id'] != null) {
            Notify::find($data['noti_id'])
                ->update(['to_admin_type_read' => 'read']);
            $href = '/faqadmin/faq_in_am/' . $data['faq_id'];
        } else {
            Notify::find($data['noti_id'])
                ->update(['to_user_id_read' => 'read']);
            $href = '/webboard/webborad_in/' . $data['web_id'];
        }

        return response()->json(
            [
                'status' => 200,
                'message' => 'อัปเดตการอ่านสำเร็จ',
                'href' => $href,
            ]
        );
    }
}
