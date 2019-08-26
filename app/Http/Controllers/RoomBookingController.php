<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Blog;
use App\Booking;
use App\BookingStatus;
Use App\Hotel;
Use App\HotelUtillity;
Use App\Message;
Use App\Payment;
Use App\PaymentStatus;
Use App\PaymentType;
Use App\Rate;
Use App\RateType;
Use App\Room;
use App\RoomImage;
use App\RoomStatus;
use App\RoomType;
class RoomBookingController extends Controller
{
    public function View()
    { 
        $booking=Booking::all();
        return view('admin.roombooking.index',['booking'=>$booking]);
    }

    public function getAdd(){
        $hotel = Hotel::all();
        $room  = Room::all();
        return view('admin.roombooking.add',['hotel'=>$hotel,'room'=>$room]);
    }
}
