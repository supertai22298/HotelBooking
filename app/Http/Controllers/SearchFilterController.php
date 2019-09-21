<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\HotelUtility;
use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchFilterController extends Controller
{
    public function executeRequest(Request $request){
        
        if (isset($request->roles)) {
            $roles = ($request->roles != null) ? $request->roles : '';
            $rate = isset($roles['rate']) ? $roles['rate'] : [''];
            $city = isset($roles['city']) ? $roles['city'] : [''];
            $price = isset($roles['price']) ? $roles['price'] : [''];

            
            $hotels = Hotel::orWhereIn('city',$city)
                    ->orWhereIn('hotel_star',$rate)
                    ->orderBy('hotel_star')
                    ->get();
            $avgHotels = [];
            foreach ($hotels as $hotel) {
                $avgHotel = $hotel->rooms->avg('price');
                array_push($avgHotels,$avgHotel);
            }
        } else {
            $hotels = Hotel::all();
            $avgHotels = [];
            foreach ($hotels as $hotel) {
                $avgHotel = $hotel->rooms->avg('price');
                array_push($avgHotels,$avgHotel);
            }
        }
        
        $data = ['hotels' => $hotels,
                'avgHotels' => $avgHotels
    ];

        return $data;
    }

    public function executeRoomRequest(Request $request){
        
        if (isset($request->roles)) {
            $roles = ($request->roles != null) ? $request->roles : '';
            $rate = isset($roles['rate']) ? $roles['rate'] : [''];
            $city = isset($roles['city']) ? $roles['city'] : [''];
            $price = isset($roles['price']) ? $roles['price'] : '>0';
            $operator = $price[0]. '=';
            $len = strlen($price) - 1;
            $price = substr($price,1,$len);
            
            // >= price or = city or = rate
            $rooms = DB::table('rooms')
                    ->join('hotels','rooms.hotel_id','=','hotels.id')
                    ->where('price',$operator,$price)
                    ->orderBy('hotel_star')
                    ->get();
            // $avgHotels = [];
            // foreach ($rooms as $room) {
            //     $avgHotel = $hotel->rooms->avg('price');
            //     array_push($avgHotels,$avgHotel);
            // }
        } else {
            $rooms = DB::table('rooms')
                    ->join('hotels','rooms.hotel_id','=','hotels.id')
                    ->orderBy('hotel_star')
                    ->get();
            // $avgHotels = [];
            // foreach ($hotels as $hotel) {
            //     $avgHotel = $hotel->rooms->avg('price');
            //     array_push($avgHotels,$avgHotel);
            // }
        }
        
        // $data = ['hotels' => $rooms,
        //         'avgHotels' => $avgHotels
    // ];
        return $rooms;
    }



    public function store(Request $request)
    {

        //room chưa đặt
        if ($request->adult == -1) {
            $rooms = Room::where('room_status_id', '=', '1')
                ->orderBy('created_at', 'desc')
                ->simplePaginate(6);
            $search = '?adult=-1';
        } else {
            if ($request->adult < 2) {
                $rooms = Room::where([['room_status_id', '=', '1'], ['room_type_id', '<', '2']])
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(6);
                $search = '?adult=1';
            } else {
                $rooms = Room::where([['room_status_id', '=', '1'], ['room_type_id', '>=', '2']])
                    ->orderBy('created_at', 'desc')
                    ->simplePaginate(6);
                $search = '?adult=3';
            }
        }

        // add $hotels for sort
        $citys = Hotel::select('city')->groupBy('city')->orderBy('city', 'desc')->get();
        $utilitys = HotelUtility::select('utility')->groupBy('utility')->orderBy('utility', 'desc')->get();
        $stars = Hotel::select('hotel_star')->groupBy('hotel_star')->orderBy('hotel_star', 'desc')->get();

        $sorts = ['citys' => $citys, 'utilitys' => $utilitys, 'stars' => $stars];

        return view('page.search.room_search', ['rooms' => $rooms->appends(Input::except('page')),'sorts' => $sorts]); //appends add other GET parameters
    }
}
