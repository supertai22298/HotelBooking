<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Get method
     * View table user
     * @return view admin.user.index
     */
    public function view()
    { 
        $getPosts = Blog::all();
        return view('admin.blog.index',['getPosts' => $getPosts, 'stt' => 1]);
    }

    /**
     * Get method
     * View page add new user
     * @return view admin.user.add
     */
    public function create()
    { 
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view admin.user.index with success| back() with error
     */
    public function store(StoreUserRequest $request)
    { 
    }

    /**
     * Get method
     * @param $id
     * @return view admin.user.edit with infomation that owned by user has that id
     */
    public function edit($id, Request $request)
    { 
    }

    /**
     * @param $id
     */
    public function update(StoreEditUserRequest $request, $id)
    {   
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return back()->with('noti','Xóa tài khoản thành công!!');
    }
}
