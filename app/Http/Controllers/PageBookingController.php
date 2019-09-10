<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Blog;
use App\Booking;
use App\BookingStatus;
use App\Hotel;
use App\HotelUtillity;
use App\Message;
use App\Payment;
use App\PaymentStatus;
use App\PaymentType;
use App\Rate;
use App\RateType;
use App\Room;
use App\RoomImage;
use App\RoomStatus;
use App\RoomType;
class PageBookingController extends Controller
{
    public function view()
    {
        $hotel = Hotel::all();
        $room  = Room::all();
        return view('page.bookings', ['hotel' => $hotel, 'room' => $room]);
    }
}
