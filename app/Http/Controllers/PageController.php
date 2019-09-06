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


    public function hotelGrid(){
        $hotels = Hotel::orderBy('created_at', 'desc')->simplePaginate(6);
        return view('page.hotel_grid', ['hotels' => $hotels]);
    }
    public function hotelDetail($id){ 
        $hotel = Hotel::findOrFail($id);
        $rooms = Room::where('hotel_id', $id)->simplePaginate(4);
        $paymentTypes = PaymentType::where('active', 1)->get();
        return view('page.hotel_detail',
            [
                'hotel' => $hotel,
                'rooms' => $rooms,
                'paymentTypes' => $paymentTypes
            ]
        );
    }

}
