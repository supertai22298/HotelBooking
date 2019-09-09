<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class PageBlogController extends Controller
{
    public function blogGrid(){
        $blogs = Blog::where('active', 1)->orderBy('created_at', 'desc')->simplePaginate(3);
        $recentBlogs = Blog::where('active', 0)->orderBy('created_at', 'desc')->take(3)->get();
        return view('page.blog.blog_grid', ['blogs' => $blogs, 'recentBlogs' => $recentBlogs]);
    }
    
    public function blogDetail($id){
        $blog = Blog::findOrFail($id);
        $recentBlogs = Blog::where('id', '<>', $id)->where('active', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return view('page.blog.blog_detail', ['blog' => $blog, 'recentBlogs' => $recentBlogs]);
    }
    
}
