<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('page.login');
    }

    public function postLogin(Request $request ){
        $username = $request->username;
        $password = $request->password;
        $checklogin = array('username' => $username, 'password' => $password);
        if (Auth::attempt($checklogin)) {
            return redirect('/');
        }else {
            return redirect('/login')->with('msg','Tài khoản hoặc mật khẩu không hợp lệ');
        }
    }

    public function getLogout(Request $request){
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/login');
    }
}
