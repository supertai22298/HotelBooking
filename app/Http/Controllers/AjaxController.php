<?php

namespace App\Http\Controllers;
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
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function getRoom($idHotel){
    	$room = Room::where('hotel_id',$idHotel)->get();
    	foreach($room as $roo)
    	{
    		echo "<option value='".$roo->id."'>".$roo->name." </option>   ";
    	} 

    }
}
