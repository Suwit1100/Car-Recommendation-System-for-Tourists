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
        dd($request->all());
        ReportPost::create([
            'post_id' => '',
            'report_by' => Auth::user()->id,
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
            'session' => 'รายงานสำเร็จ'
        ]);
    }
}
