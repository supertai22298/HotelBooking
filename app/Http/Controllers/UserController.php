<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEditUser;
use App\User;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests\StoreUser;

class UserController extends Controller
{
    /**
     * Get method
     * View table user
     * @return view admin.user.index
     */
    public function viewAllUsers()
    { 
        $getUsers = User::all();  
        return view('admin.user.index',['getUsers' => $getUsers, 'stt' => 1]);
    }

    /**
     * Get method
     * View page add new user
     * @return view admin.user.add
     */
    public function create()
    { 
        return view('admin.user.add');
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view admin.user.index with success| back() with error
     */
    public function store(StoreUser $request)
    { 
        $user = new User();
        
        // call funtion from app\heplers\helper
        $input = Helper::getArrInput($request);
        $user->create($input);
        
        return back()->with('noti','Thêm mới tài khoản thành công!!');
    }

    /**
     * Get method
     * @param $id
     * @return view admin.user.edit with infomation that owned by user has that id
     */
    public function edit($id, Request $request)
    { 
        $user = User::find($id);
        return view('admin.user.edit',['user' => $user]);
    }

    /**
     * @param $id
     */
    public function update(StoreEditUser $request, $id)
    {   
        $input = Helper::update($id,$request);
        return back()->with('noti','Chỉnh sửa tài khoản thành công!!');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('noti','Xóa tài khoản thành công!!');
    }

}
