<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Helpers\BlogHelper;
use App\Http\Requests\StoreBlogRequest;
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
     * View table user
     * @return view admin.user.index
     */
    public function detail($id)
    { 
        $post = Blog::find($id);
        return view('admin.blog.detail',['post' => $post]);
    }

    /**
     * Get method
     * View page add new user
     * @return view admin.user.add
     */
    public function create()
    {
        return view('admin.blog.add');
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view admin.user.index with success| back() with error
     */
    public function store(StoreBlogRequest $request)
    { 
        $blog = new Blog();
        
        $input = BlogHelper::getArrInput($request);
        $blog->create($input);
        
        return back()->with('noti','Thêm mới bài viết thành công!!');
    }

    /**
     * Get method
     * @param $id
     * @return view admin.user.edit with infomation that owned by user has that id
     */
    public function edit($id, Request $request)
    {
        $post = Blog::find($id);
        return view('admin.blog.edit', ['post' => $post]);
    }

    /**
     * @param $id
     */
    public function update(StoreBlogRequest $request, $id)
    {   
        BlogHelper::update($id,$request);
        return back()->with('noti','Chỉnh sửa bài viết thành công!!');
    }

    public function delete($id)
    {
        $post = Blog::find($id);
        $post->delete();
        return back()->with('noti','Xóa bài viết thành công!!');
    }
}
