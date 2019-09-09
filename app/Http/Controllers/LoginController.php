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
        return back()->with('success', 'Đăng nhập thành công')->withInput();;
    } else {
        return back()->with('errorSQL', 'Đăng nhập thất bại')->withInput();;
    }
  }

  public function getLogout(){
      Auth::logout();
      return view('page_layout.page_masterpage');
  }
    
}
