<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating user for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect user after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }

    public function getAdminLogin(){
        return view('admin.auth.login');
    }

    public function postAdminLogin(Request $request){
    // check login here1
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            
            if (Auth::user()->role == 0 && Auth::user()->active == 1) {
                $request->session()->put(
                    'user',
                    [
                        'username' => Auth::user()->username,
                        'email' => Auth::user()->email,
                        'avatar' => Auth::user()->avatar,
                        'role' => Auth::user()->role,
                        'active' => Auth::user()->active,
                        'first_name' => Auth::user()->first_name,
                        'last_name' => Auth::user()->last_name,
                        'gender' => Auth::user()->gender,
                        'date_of_birth' => Auth::user()->date_of_birth,
                        'address' => Auth::user()->address,
                    ]
                );
                return redirect('/admin');   
            } else {
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect('/admin-login')->with('msg','Tài khoản này đang bị khóa hoặc không thể đăng nhập');
            }
        } else {
            return redirect('/admin-login')->with('msg','Tài khoản hoặc mật khẩu không hợp lệ');
        }
        
    }

    public function logout(Request $request){

        $user = Auth::user();
        if ($user == null) {
            return redirect('/errors/404');
        }
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect('/');
    }
}
