<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test()
    {
        $test = DB::table('test')->get();
        // dd($test);

        // ex1
        // $imgNames = $test->pluck('imgname');
        // dd($imgNames);

        // ex2
        $imgNames = [];
        foreach ($test as $itest) {
            $imgNames[] = $itest->imgname;
        }
        // dd($imgNames);

        // ลูปลบภาพ
        $location_path = 'assets/imgtest/';
        foreach ($imgNames as $imageName) {
            $filePath = $location_path . $imageName;
            // dd($imageName);
            if (file_exists($filePath)) {
                if ($filePath != 'assets/imgtest/') {
                    unlink($filePath);
                }
            }
        }
    }
}
