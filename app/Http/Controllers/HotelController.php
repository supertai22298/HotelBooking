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

        if($request->hasFile('image')){
            $imageName = time() . '_hotel_' .rand(0, 84600). '.'. $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload'), $imageName);
        }

        $hotel->name = request('name');
        $hotel->motto = request('motto');
        $hotel->hotel_star = request('hotel_star');
        $hotel->address = request('address');
        $hotel->city = request('city');
        $hotel->country = request('country');
        $hotel->address_2 = request('address_2');
        $hotel->main_phone_number = request('main_phone_number');
        $hotel->toll_free_number = request('toll_free_number');
        $hotel->company_email_address = request('company_email_address');
        $hotel->website_address = request('website_address');
        $hotel->image = $imageName;
        $hotel->image_link = request('image_link');

        $hotel->save();

        dd($hotel);
    }
}
