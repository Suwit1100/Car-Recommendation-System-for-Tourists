<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register_view()
    {
        $region = DB::table('thai_geographies')->get();
        return view('auth.register', compact('region'));
    }

    public function register_post(Request $request)
    {
        // dd($request->all());
        $data = $request->all();

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
                'birthday.before' => 'คุณต้องมีอายุไม่ต่ำกว่า 18 ปี',
            ]
        );

        $usernew = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'type' => 0,
            'password' => Hash::make($data['password']),
            'imgprofile' => 'user_base_profile.png',
            'sex' => $data['sex'],
            'birthday' => $data['birthday'],
            'region' => $data['region'],
            'province' => $data['povinces'],
            'district' => $data['district'],
            'sub_district' => $data['sub_district'],
            'zipcode' => $data['zipcode'],
        ]);

        return redirect()->back()->with('success-register', 'สมัครสมาชิกสำเร็จ');
    }

    public function register_pull_address(Request $request)
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
}
