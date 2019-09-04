<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdminLoin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
        //kiểm tra admin hiện tại có bị khóa hay không  
            $admin = User::find($id);
            if ($admin->active == 1 && $admin->role == 0) {
                return $next($request);
            } else {
                Auth::logout();
                $request->session()->flush();
                $request->session()->regenerate();
                return redirect('/admin-login')->with('msg','Tài khoản này đã bị khóa hoặc không có quyền');
            }
        }
        return redirect('/admin-login')->with('msg','Hãy đăng nhập để truy cập vào trang này');
    }
}
