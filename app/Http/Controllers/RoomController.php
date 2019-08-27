<?php

namespace App\Http\Controllers;

use App\Hotel;
use Illuminate\Http\Request;
use App\Room;
use App\RoomType;

class RoomController extends Controller
{
    /**
     * Get method
     * View table room
     * @return view admin.room.index
     */
    public function view()
    {
        $rooms = Room::all();
        return view('admin.room.index', ['rooms' => $rooms]);
    }

    /**
     * Get method
     * View page add new room
     * @return view admin.room.add
     */
    public function create()
    {
        $roomTypes = RoomType::all();
        $hotels = Hotel::all();
        return view('admin.room.add', compact([$roomTypes, $hotels]));
        
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view back() with success| back() with error
     */
    public function store(Request $request)
    {
        $room = new Room();
        $imageName = 'default.png';
        try {
            if($request->hasFile('image')){
                $helper = new Helper();
                $imageName = $helper->uploadFile(request('image'));
            }
            $room->hotel_id = request('hotel_id');
            $room->room_type_id = request('room_type_id');
            $room->room_status_id = request('room_status_id');
            $room->name = request('name');
            $room->floor = request('floor');
            $room->description = request('description');
            $room->price = request('price');
            $room->discount = request('discount');
            $room->image_link = request('image_link');
            $room->image = $imageName;
           

            //$room->save();
        } catch (Exception $e) {
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return redirect()->back()->with('success', 'Thêm mới thành công');
    }

    /**
     * Get method
     * @param $id
     * @return back() with success or errorSQL
     */
    public function delete($id){
        try {
            $room = Room::findOrFail($id);
            $room->delete();

        } catch (Exception $e) {
            return back()->with('errorSQL', 'Có lỗi xảy ra');
        }
        
        return redirect()->back()->with('success', 'Xoá thành công');
    }

    /**
     * Get method
     * @param int $id
     * @return view
     */
    public function edit($id){
        $room = Room::findOrFail($id);
        return view('admin.room.edit', ['room' => $room]);
    }
    
    /**
     * Post method
     * @param int $id
     * @param Request $request
     * @return back() with success or errorSQL
     */
    public function update($id, HotelRequest $request){
    }
    /**
     * Get method
     * @param int $id
     * @return view
     */
    public function detail($id){
        $room = Room::findOrFail($id);
        return view('admin.room.detail', ['Room' => $room]);
    }

}
