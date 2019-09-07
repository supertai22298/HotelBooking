<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class PageRoomController extends Controller
{
    //
    public function roomGrid(){
        $rooms = Room::orderBy('created_at', 'desc')->simplePaginate(6);
        return view('page.room_grid', $rooms);
    }
    public function roomDetail(){

    }
}
