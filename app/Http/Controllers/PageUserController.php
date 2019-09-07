<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageUserController extends Controller
{
    public function view(){
        return view('page.user.dashboard');
    }

}
