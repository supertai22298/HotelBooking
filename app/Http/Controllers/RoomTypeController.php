<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;

class RoomTypeController extends Controller
{
     /**
     * Get method
     * View table user
     * @return view admin.user.index
     */
    public function view()
    { 
        $roomTypes = RoomType::all();
        return view('admin.room_type.index', ['roomTypes' => $roomTypes]);
    }
    
    /**
     * Post method
     * Ajax for field has Unique constraint
     * @param array $room_type
     * @return json|text|mixed pass||error
     */
    public function checkUnique(){

    }
    /**
     * Get method
     * View page add new user
     * @return view admin.user.add
     */
    public function create()
    { 
        return view('admin.room_type.add');
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view admin.user.index with success| back() with error
     */
    public function store(Request $request)
    {
        $roomType = new RoomType();
        $roomType->create($request->all());
    }

    /**
     * Get method
     * @param $id
     * @return view admin.user.edit with infomation that owned by user has that id
     */
    public function edit($id, Request $request)
    { }
    /**
     * @param $id
     */
    public function update($id, Request $request)
    { }

    public function delete($id)
    { }
    
}
