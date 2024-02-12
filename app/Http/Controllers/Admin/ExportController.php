<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReviewExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function export_view()
    {
        return view('admin.export.export-view');
    }

    public function export_get(Request $request)
    {
        // dd($request->all());
        $year = $request->year;
        $month = $request->month;
        $datestart = $request->datestart;
        $dateend = $request->dateend;

        $request->session()->put('year', $request->year);
        $request->session()->put('month', $request->month);
        $request->session()->put('datestart', $request->datestart);
        $request->session()->put('dateend', $request->dateend);


        $table_export = DB::table('review_recomment')
            ->when($year, function ($query, $year) {
                return $query->whereRaw('YEAR(created_at) LIKE ?', ['%' . $year . '%']);
            })
            ->when($month, function ($query, $month) {
                return $query->whereRaw('MONTH(created_at) = ?', [$month]);
            })
            ->when($datestart, function ($query, $datestart) {
                return $query->where('review_recomment.created_at', '>=', $datestart);
            })
            ->when($dateend, function ($query, $dateend) {
                return $query->where('review_recomment.created_at', '<=', $dateend);
            })
            ->get();


        return view('admin.export.export-table', compact('table_export',));
    }

    public function export_toexcel(Request $request)
    {
        // dd($request->all());
        $yearvalue = $request->input('yearvalue');
        $monthvalue = $request->input('monthvalue');
        $datestartvalue = $request->input('datestartvalue');
        $dateendvalue = $request->input('dateendvalue');

        return Excel::download(new ReviewExport($yearvalue, $monthvalue, $datestartvalue, $dateendvalue,), 'ReviewExport.xlsx');
    }
}
