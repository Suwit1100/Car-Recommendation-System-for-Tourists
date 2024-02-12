<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CarDataset;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManageUserController extends Controller
{
    public function view_manage_user()
    {
        $users = User::all();
        $region = DB::table('thai_geographies')->get();

        return view('admin.manageuser.manageuser-view', compact('users', 'region'));
    }

    public function add_user(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'email' => 'required|email|unique:users',
                'password' => 'required_with:password_confirmation|min:6|same:password_confirmation',
                'birthday' => 'required|date|before:today -18 years',
            ],
            [
                'email.unique' => 'มีอีเมลนี้อยู่แล้ว',
                'password.min' => 'รหัสผ่านต้องมีความยาวอย่างน้อย 6 ตัวอักษร',
                'password.same' => 'รหัสผ่านยืนยันไม่ตรงกับรหัสผ่าน',
                'birthday.date' => 'รูปแบบวันเกิดไม่ถูกต้อง',
                'birthday.before' => 'อายุต้องไม่ต่ำกว่า 18 ปี',
            ]
        );

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'type' => $data['type'],
            'password' => Hash::make($data['password']),
            'imgprofile' => ('user_base_profile.png'),
            'sex' => $data['sex'],
            'birthday' => $data['birthday'],
            'region' => $data['region'],
            'province' => $data['povinces'],
            'district' => $data['district'],
            'sub_district' => $data['sub_district'],
            'zipcode' => $data['zipcode'],
        ]);

        return redirect()->back()->with('success-add-user', 'เพิ่มข้อมูลสมาชิกสำเร็จ');
    }

    public function force_delete_user($id)
    {
        $forcedelete_user = User::find($id);
        // dd($id);
        $location_path = 'assets/imguser/';
        if ($forcedelete_user->imgprofile !== 'user_base_profile.png') {
            $imgpath = $forcedelete_user->imgprofile;
            if (file_exists($location_path . $imgpath)) {
                unlink($location_path . $imgpath);
            }
        }

        $forcedelete_user->delete();



        return redirect()->back()->with('success-force-user', 'ลบข้อมูลสมาชิกถาวรสำเร็จ');
    }

    public function queryaddress(Request $request)
    {
        // dd($request->all());
        $region = $request->selectedRegion;
        $povince_post = $request->selectedPovinces;
        $district_post = $request->selectedDistrict;
        $sub_district_post = $request->selectedSub_District;
        $povice = DB::table('thai_provinces')->where('geography_id', $region)->get();
        $district = DB::table('thai_amphures')->where('province_id', $povince_post)->get();
        $sub_district = DB::table('thai_tambons')->where('amphure_id', $district_post)->get();
        $zipcode = DB::table('thai_tambons')->where('id', $sub_district_post)->get();
        // dd($zipcode);


        return response()->json(['povice' => $povice, 'district' => $district, 'sub_district' => $sub_district, 'zipcode' => $zipcode]);
    }

    public function edit_user($id)
    {
        $user = User::find($id);

        $region_id = DB::table('thai_geographies')
            ->where('name', $user->region)
            ->first();
        $thai_provinces_id = DB::table('thai_provinces')
            ->where('name_th', $user->province)
            ->first();
        $thai_amphures_id = DB::table('thai_amphures')
            ->where('name_th', $user->district)
            ->first();

        $zipcode = DB::table('thai_tambons')
            ->where('name_th', $user->sub_district)
            ->get();

        $region = DB::table('thai_geographies')->get();
        $thai_provinces = DB::table('thai_provinces')->where('geography_id', $region_id->id)->get();
        $thai_amphures = DB::table('thai_amphures')->where('province_id', $thai_provinces_id->id)->get();
        $thai_tambons = DB::table('thai_tambons')->where('amphure_id', $thai_amphures_id->id)->get();
        return view('admin.manageuser.edit-user', compact('user', 'region', 'thai_provinces', 'thai_amphures', 'thai_tambons', 'zipcode'));
    }
}
