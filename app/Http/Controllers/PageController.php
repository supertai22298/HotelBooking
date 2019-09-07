<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Hotel;
use App\PaymentType;
use App\Room;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function view(){
        $hotels = Hotel::where('hotel_star', '>=',  4)->take(6)->get();
        $blogs = Blog::where('active', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return view('page.index', ['hotels' => $hotels, 'blogs' => $blogs]);
    }
}
