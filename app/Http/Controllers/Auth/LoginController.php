<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\UseModel;
use App\Models\VisitWeb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $input = $request->all();
        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->type == 1) {
                UseModel::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['user_id' => Auth::user()->id, 'user_type' => Auth::user()->type, 'text_detail' => 'กำลังใข้งาน']
                );

                Log::create([
                    'user_id' => Auth::user()->id,
                    'user_type' => Auth::user()->type,
                    'text_detail' => 'เข้าสู๋ระบบ',
                ]);

                VisitWeb::create([
                    'user_id' => Auth::user()->id,
                    'user_type' => Auth::user()->type,
                    'text_detail' => 'เข้าสู๋ระบบ',
                ]);
                return redirect()->route('home_admin');
            } else if (auth()->user()->type == 0) {
                UseModel::updateOrCreate(
                    ['user_id' => Auth::user()->id],
                    ['user_id' => Auth::user()->id, 'user_type' => Auth::user()->type, 'text_detail' => 'กำลังใข้งาน']
                );

                Log::create([
                    'user_id' => Auth::user()->id,
                    'user_type' => Auth::user()->type,
                    'text_detail' => 'เข้าสู๋ระบบ',
                ]);

                VisitWeb::create([
                    'user_id' => Auth::user()->id,
                    'user_type' => Auth::user()->type,
                    'text_detail' => 'เข้าสู๋ระบบ',
                ]);
                return redirect()->route('home_user');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'อีเมลหรือรหัสผ่านของคุณไม่ถูกต้อง');
        }
    }
}
