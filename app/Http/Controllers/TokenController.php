<?php

namespace App\Http\Controllers;

use App\Models\TokenLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function token_save(Request $request)
    {
        // dd($request->all());
        TokenLine::updateOrCreate(
            ['user_id' => Auth::user()->id],
            [
                'user_id' => Auth::user()->id,
                'user_type' => Auth::user()->type,
                'token_text' => $request->tokenline,
                'status_token' => ($request->tokenline == null) ? 'off' : 'on'
            ]
        );

        return redirect()->back()->with('save_token', 'บันทึกโทเคนสำเร็จ');
    }
    public function status_token(Request $request)
    {
        // dd($request->all());
        TokenLine::where('user_id', Auth::user()->id)->update(['status_token' => $request->val_status]);
        return response()->json(
            [
                'status' => 200,
                'status_success' => 'ตั้งค่าการแจ้งเตือนสำเร็จ'
            ]
        );
    }
}
