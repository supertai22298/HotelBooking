<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    public function view()
    {
        return view('page.register.register');
    }

    public function store(RegistrationRequest $request)
    {
        $verify_code = str_random(30);
        // $today = Carbon::now();
        // dd($today->format("Y-m-d h:m:s"));
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'verify_code' => $verify_code,
            'active' => 0
        ]);
        Mail::send('page.register.verify',['code' => $verify_code,'name' => $request->username], function($msg){
            $msg->to(Input::get('email'),Input::get('username'))->subject('Xác thực tài khoản HATABOOKING');
        });
        return view('page.register.wait_verify');
    }

    public function verify($code)
    {
        $user = User::where('verify_code',$code)->get();
        // dd($user[0]->username);
        if ($user->count() > 0) {
            $user[0]->active = 1;
            $user[0]->verify_code = null;
            $user[0]->save();
            Auth::loginUsingId($user[0]->id);
            return redirect('/');
        } else {
            return redirect('/login')->with('msg','Đăng nhập không thành công!');
        }
    }
}
