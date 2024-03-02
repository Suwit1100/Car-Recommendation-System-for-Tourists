<?php

namespace App\Http\Controllers;

use App\Models\ReportComment;
use App\Models\ReportPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function report_post_user(Request $request)
    {
        // dd($request->all());
        $id_post =  $request->id_post;
        $post = DB::table('post')
            ->where('id', $id_post)
            ->first();

        $postby = DB::table('users')
            ->where('id', $post->post_by)
            ->first();

        ReportPost::create([
            'post_id' => $id_post,
            'report_by' => Auth::user()->id,
            'post_by' =>   $postby->name
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
        $reportcomment = DB::table('table_reportcomment')
            ->leftJoin('users', 'table_reportcomment.report_by', '=', 'users.id')
            ->leftJoin('post_comment', 'table_reportcomment.comment_id', '=', 'post_comment.id')
            ->select('users.name', 'post_comment.content')
            ->orderBy('table_reportcomment.created_at', 'DESC')
            ->get();

        dd($reportcomment);

        return view('admin.report.repost-comment');
    }
}
