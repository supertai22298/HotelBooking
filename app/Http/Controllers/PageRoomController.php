<?php

namespace App\Http\Controllers;

use App\PaymentType;
use Illuminate\Http\Request;
use App\Room;

class PageRoomController extends Controller
{
    //
    public function roomGrid(){
        $rooms = Room::where('room_status_id', 1)->orderBy('created_at', 'desc')->simplePaginate(6);
        return view('page.room.room_grid', ['rooms' => $rooms]);
    }
    public function roomDetail($id){
        $room = Room::findOrFail($id);
        $rooms = Room::where('id', '<>', $id)->where('room_status_id', 1)->simplePaginate(3);
        $paymentTypes = PaymentType::where('active', 1)->get();
        return view('page.room.room_detail', [
            'room' => $room,
            'rooms' => $rooms,
            'paymentTypes' => $paymentTypes,
        ]);
    }
}
