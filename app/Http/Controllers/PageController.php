<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Hotel;
use App\PaymentType;
use App\Room;
use App\RoomStatus;
use App\RoomType;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function view(){
        $hotels = Hotel::where('hotel_star', '>=',  4)->take(6)->get();
        $blogs = Blog::where('active', 1)->orderBy('created_at', 'desc')->take(3)->get();
        return view('page.index', ['hotels' => $hotels, 'blogs' => $blogs]);
    }

    public function search(Request $request){
        $search_key = $request->search_key;

        $hotel_id = [];
        $room_status_id = [];
        $room_type_id = [];

        $data ='<ul class="list-group"><li class="list-group-item"> <strong>Khách sạn liên quan </strong><li/>';
        
        //tìm những khách sạn có chứa từ khoá
        $hotels = Hotel::where('name', 'LIKE', "%$search_key%")
            ->orWhere('city', 'LIKE', "%$search_key%")
            ->orWhere('address', 'LIKE', "%$search_key%")
            ->take(6)->get();
        //lấy id khách sạn
        if (count($hotels) > 0) {
            foreach ($hotels as $hotel) {
                array_push($hotel_id, $hotel->id);
                $data .= "<li class='list-group-item' ><a href='/hotel/detail/{$hotel->id}'>$hotel->name, $hotel->city </a></li>";
            }
        }
        //tìm những loại phòng có chứa từ khoá
        $roomTypes = RoomType::where('room_type', 'LIKE', "%$search_key%")
        ->orWhere('description', 'LIKE', "%$search_key%")->get();

        foreach ($roomTypes as $roomType) {
            array_push($room_type_id, $roomType->id);
        }
        //-----------------

        //------------------tìm loại trạng thái
        $roomStatuses = RoomStatus::where('room_status', 'LIKE', "%$search_key%")
        ->orWhere('description', 'LIKE', "%$search_key%")->get();

        foreach ($roomStatuses as $roomStatus) {
            array_push($room_status_id, $roomStatus->id);
        }
        //------------------

        $rooms = Room::orWhere('name', 'LIKE', "%$search_key%")
            ->orWhere('description', 'LIKE', "%$search_key%")
            ->orWhere('price', 'LIKE', "%$search_key%")
            ->orWhereIn('hotel_id', $hotel_id)
            ->orWhereIn('room_type_id', $room_type_id)
            ->orWhereIn('room_status_id', $room_status_id)
            ->take(10)->get();


        $data .="<li class='list-group-item' > <strong>Phòng liên quan </strong><li/>";
        if(count($rooms)){
            foreach ($rooms as $room) {
                $data .= "<li  class='list-group-item' ><a href='/room/detail/{$room->id}'>{$room->name}, {$room->hotel->city} </a></li>";
            }
        }
     

        $data .= "<ul/>";
        return response()->json([
            'data' => $data
        ]);
    }
}
