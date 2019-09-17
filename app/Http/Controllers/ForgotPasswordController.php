<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function view()
    {
        return view('page.forgot_pass.forgot_passwrod');
    }

    public function store(Request $request)
    {
        $user = User::where(['username' => $request->username, 'email' => $request->email])->get();

        if ($user->count() > 0) {
            $new_password = str_random(10);
            $user[0]->password = bcrypt($new_password);
            $user[0]->save();
            Mail::send('page.forgot_pass.verify', ['name' => $request->username, 'new_password' => $new_password], function ($msg) {
                $msg->to(Input::get('email'), Input::get('username'))->subject('Quên mật khẩu HATABOOKING');
            });
            return view('page.forgot_pass.wait_verify');
        } else {
            return back()->with('msg', 'Tên email hoặc tài khoản không chính xác');
        }
    }
}
