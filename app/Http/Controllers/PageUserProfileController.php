<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageUserProfileController extends Controller
{
    public function view(){
        return view('page.user.user_profile');
    }

    public function edit($id){
        return view('page.user.eidt_profile');
    }

    public function update($id ,Request $request){

        // return view('page.user_profile');
    }
}
