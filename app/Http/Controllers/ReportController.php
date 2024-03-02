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
        dd($request->all());

        ReportComment::create([
            'comment_id' => '',
            'report_by' => Auth::user()->id,
        ]);
    }
}
