<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\PaymentType;
use App\Room;
use Illuminate\Http\Request;

class PageHotelController extends Controller
{
    public function hotelGrid(){
        $hotels = Hotel::orderBy('created_at', 'desc')->simplePaginate(6);
        return view('page.hotel.hotel_grid', ['hotels' => $hotels]);
    }
    public function hotelDetail($id){ 
        $hotel = Hotel::findOrFail($id);
        $rooms = Room::where('hotel_id', $id)->simplePaginate(4);
        $paymentTypes = PaymentType::where('active', 1)->get();
        return view('page.hotel.hotel_detail',
            [
                'hotel' => $hotel,
                'rooms' => $rooms,
                'paymentTypes' => $paymentTypes
            ]
        );
    }
}
