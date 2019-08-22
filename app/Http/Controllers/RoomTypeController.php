<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;

class RoomTypeController extends Controller
{
    
    public function create(Request $request){
        $this->roomTypeRepository->create($request->all());
        return redirect('/');
    }
}
