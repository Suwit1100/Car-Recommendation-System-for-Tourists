<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EditProfileController extends Controller
{
    public function edit_profile_view()
    {

        // id
        $region_id = DB::table('thai_geographies')
            ->where('name', Auth::user()->region)
            ->first();
        $thai_provinces_id = DB::table('thai_provinces')
            ->where('name_th', Auth::user()->province)
            ->first();
        $thai_amphures_id = DB::table('thai_amphures')
            ->where('name_th', Auth::user()->district)
            ->first();

        $zipcode = DB::table('thai_tambons')
            ->where('name_th', Auth::user()->sub_district)
            ->get();
        // dd($zipcode);

        $user = Auth::user();
        $region = DB::table('thai_geographies')->get();
        $thai_provinces = DB::table('thai_provinces')->where('geography_id', $region_id->id)->get();
        $thai_amphures = DB::table('thai_amphures')->where('province_id', $thai_provinces_id->id)->get();
        $thai_tambons = DB::table('thai_tambons')->where('amphure_id', $thai_amphures_id->id)->get();
        // dd($thai_tambons);
        return view('editprofile.editprofile', compact('user', 'region', 'thai_provinces', 'thai_amphures', 'thai_tambons', 'zipcode'));
    }

    public function edit_profile_post(Request $request, $id)
    {
        // dd($request->all());
        $olddata = DB::table('users')
            ->where('id', $id)
            ->first();
        // dd($request->all());

        $request->validate([
            // 'region' => 'required',
            // 'povinces' => 'required',
            // 'district' => 'required',
            // 'sub_district' => 'required',
            // 'zipcode' => 'required',
            'birthday' => 'required|date|before_or_equal:today|before_or_equal:-18 years',
        ], [
            // 'region.required' => 'คุณยังไม่ได้เลือกภาค',
            // 'povinces.required' => 'คุณยังไม่ได้เลือกจังหวัด',
            // 'district.required' => 'คุณยังไม่ได้เลือกอำเภอ',
            // 'sub_district.required' => 'คุณยังไม่ได้เลือกตำบล',
            // 'zipcode.required' => 'คุณยังไม่ได้เลือกรหัสไปรษณีย์',
            'birthday.before_or_equal' => 'อายุไม่ถึง 18 ปี',
        ]);


        if ($request->has('file-upload')) {

            $updateimgpofile = $request->file('file-upload');
            $name_gen = hexdec(uniqid()); //genชื่อ
            $img_ext = strtolower($updateimgpofile->getClientOriginalExtension()); //type ไฟล์ แล้วปรับพิมเล็ก
            // dd($img_ext);
            $img_profile = $name_gen . '.' . $img_ext; //ชื่อ.typeไฟล์
            $upload_location = 'assets/imguser/'; //ที่ต้องการอัพไฟล์

            $updateimgpofile->move($upload_location, $img_profile); //อัพภาพ

            $old_image = $request->old_img_profile; //ภาพเก่า
            // dd($old_image);
            if ($old_image !== 'user_base_profile.png') { //ต้องเช็คเพราะ ค่าเริ่มต้นคือ user_base_profile.png
                if (file_exists($upload_location . $old_image)) {
                    unlink($upload_location . $old_image);
                }
            }
            $updateprofile = User::find($id)->update([
                'imgprofile' => !empty($img_profile) ? $img_profile : $old_image,
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'sex' => $request->sex,
                'birthday' => $request->birthday,
                'region' => $request->region,
                'province' => ($request->province == null ? $olddata->province : $request->province),
                'district' => ($request->district == null ? $olddata->district : $request->district),
                'sub_district' => ($request->sub_district == null ? $olddata->sub_district : $request->sub_district),
                'zipcode' => ($request->zipcode == null ? $olddata->zipcode : $request->zipcode),

            ]);
        } else {

            $updateprofile = User::find($id)->update([
                'name' => $request->name,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'sex' => $request->sex,
                'birthday' => $request->birthday,
                'region' => $request->region,
                'province' => ($request->province == null ? $olddata->province : $request->province),
                'district' => ($request->district == null ? $olddata->district : $request->district),
                'sub_district' => ($request->sub_district == null ? $olddata->sub_district : $request->sub_district),
                'zipcode' => ($request->zipcode == null ? $olddata->zipcode : $request->zipcode),

            ]);
        }

        //บันทึก Log
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ได้แก้ไขข้อมูลส่วนตัว',
        ]);
        return redirect()->back()->with('success-updateprofile', 'อัปเดตโปรไฟล์เรียบร้อย');
    }
}
