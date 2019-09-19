<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelUtility;
use App\PaymentType;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageHotelController extends Controller
{
    public function hotelGrid(){

        // $hotels = DB::table('hotels')
        //             ->join('rooms','rooms.hotel_id','=','hotels.id')
        //             ->whereIn('city',['Hà Nội'],'and')
        //             ->whereIn('hotel_star',['5'],'and')
        //             ->where('rooms.price','<','500000')
        //             ->orderBy('hotel_star')
        //             ->get();
        // dd($hotels);



        $hotels = Hotel::orderBy('created_at', 'desc')->simplePaginate(6);
        // add $hotels for sort
        $citys = Hotel::select('city')->groupBy('city')->orderBy('city','desc')->get();
        $utilitys = HotelUtility::select('utility')->groupBy('utility')->orderBy('utility','desc')->get();
        $stars = Hotel::select('hotel_star')->groupBy('hotel_star')->orderBy('hotel_star','desc')->get();

        $sorts = ['citys' => $citys, 'utilitys' => $utilitys, 'stars' => $stars];
        
        return view('page.hotel.hotel_grid', ['hotels' => $hotels,'sorts' => $sorts]);
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
