<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function view(){
        return view('page.index');
    }

    public function getLogin(){
        return view('page.login');
    }

    public function getHotel(){
        return view('page.hotel_detail');
    }
    public function getGrid(){
        return view('page.hotel_grid_left_sidebar');
    }
}
