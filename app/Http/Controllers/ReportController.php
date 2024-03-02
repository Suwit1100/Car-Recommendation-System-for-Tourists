<?php

namespace App\Http\Controllers;

use App\Models\ReportComment;
use App\Models\ReportPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function report_post_user(Request $request)
    {
        // dd($request->all());
        $id_post =  $request->id_post;
        ReportPost::create([
            'post_id' => $id_post,
            'report_by' => Auth::user()->id,
        ]);

        return response()->json([
            'status' => '200',
            'session_reportpost' => 'รายงานกระทู้สำเร็จ'
        ]);
    }

    public function report_comment_user(Request $request)
    {
        // dd($request->all());
        $id_comment = $request->id_comment;

        ReportComment::create([
            'comment_id' => $id_comment,
            'report_by' => Auth::user()->id,
        ]);

        return response()->json([
            'status' => '200',
            'session' => 'รายงานความคิดเห็นสำเร็จ'
        ]);
    }

    public function report_post_view_admin(Request $request)
    {
        return view('admin.report.repost-post');
    }

    public function report_post_comment_admin(Request $request)
    {
        return view('admin.report.repost-comment');
    }
}
