<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel;
use App\Http\Requests\HotelRequest;

class HotelController extends Controller
{
    /**
     * Get method
     * View table hotel
     * @return view admin.hotel.index
     */
    public function view()
    {
        $hotels = Hotel::all();
        return view('admin.hotel.index', ['hotels' => $hotels]);
    }

    /**
     * Get method
     * View page add new hotel
     * @return view admin.hotel.add
     */
    public function create()
    {
        return view('admin.hotel.add');
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view back() with success| back() with error
     */
    public function store(HotelRequest $request)
    {
        $hotel = new Hotel();
        $hotel->create($request->all());
        //dd($request->all());
    }
}
