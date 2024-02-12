<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\ReviewRecomment;
use App\Models\UseModel;
use App\Models\User;
use App\Models\VisitWeb;
use Carbon\Factory;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminHomeController extends Controller
{
    public function home_view()
    {
        Paginator::useBootstrap();
        $log_user = Log::leftJoin('users', 'log.user_id', '=', 'users.id')
            ->orderBy('log.created_at', 'desc')->get();
        $user_dashboard = User::all();
        $num_user = UseModel::all(); //กำลังใช้งานอยู่
        $total_faq = DB::table('faq')->where('toAdminType', 1)
            ->where('statusAdmin', 'new')->get(); // คำขอช่วยเหลือ
        $num_reccomment = ReviewRecomment::all(); // จำการใช้แนะนำ


        $monthsData = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthsData[] =  ['month' => $i, 'count' => 0];
        }

        $visit_web = [];
        for ($i = 1; $i <= 12; $i++) {
            $visit_web[] =  ['month' => $i, 'count' => 0];
        }
        // สร้างเดือน

        // ดึงข้อมูลจากฐานข้อมูลและรวมลงในอาร์เรย์
        $testData = DB::table('review_recomment')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();



        // รวมข้อมูลลงในอาร์เรย์ต้นฉบับ
        foreach ($monthsData as $key => $month) {
            foreach ($testData as $test) {
                if ($test->month == $month['month']) {
                    $monthsData[$key]['count'] = $test->count;
                }
            }
        }

        $visitwebData = DB::table('visitweb')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy('month', 'asc')
            ->get()
            ->toArray();

        foreach ($visit_web as $key => $item_visit) {
            foreach ($visitwebData as $item_visit_web_data) {
                if ($item_visit_web_data->month == $item_visit['month']) {
                    $visit_web[$key]['count'] = $item_visit_web_data->count;
                }
            }
        }

        // dd($visit_web);
        // dd($visitwebData, $testData);
        // dd($visitwebData);
        $num_visit_web = $visit_web;
        $testdata = $monthsData;



        $num_rec = ReviewRecomment::all(); // จำการใช้แนะนำ
        return view('admin.home', compact('log_user', 'user_dashboard', 'num_user', 'testdata', 'num_visit_web', 'total_faq', 'num_reccomment'));
    }

    public function load_more_noti_admin(Request $request)
    {
        // dd($request->all());
        $page = $request->page;
        $ofset = ($page - 1) * 3;
        $notiadmin = DB::table('notify')
            ->leftJoin('users', 'notify.user_send_id', '=', 'users.id')
            ->leftJoin('post', 'notify.web_id', '=', 'post.id')
            ->leftJoin('faq', 'notify.faq_id', '=', 'faq.id')
            ->where('to_user_id', Auth::user()->id)
            ->orwhere('to_admin_type', 1)
            ->select('users.name', 'users.lastname', 'users.imgprofile', 'notify.*', 'faq.title As faqtitle', 'post.title As posttitle')
            ->orderBy('notify.created_at', 'DESC')
            ->skip($ofset)
            ->take(3);
        $view = view('include.homeadmin.notiadmin', compact('notiadmin'))->render();
        return response()->json(['html' => $view]);
    }
}
