<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\UseModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout()
    {
        Log::create([
            'user_id' => Auth::user()->id,
            'user_type' => Auth::user()->type,
            'text_detail' => 'ออกจากระบบ',
        ]);
        UseModel::where('user_id', Auth::user()->id)->delete();
        Auth::logout();
        return redirect()->route('login');
    }
}
