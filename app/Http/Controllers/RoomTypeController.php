<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Room;
use Illuminate\Http\Request;
use App\RoomType;
use Exception;

class RoomTypeController extends Controller
{
    /**
     * Get method
     * View table room_types
     * @return view admin.room_type.index
     */
    public function view()
    {
        $roomTypes = RoomType::orderBy('created_at', 'desc')->get();
        return view('admin.room_type.index', ['roomTypes' => $roomTypes]);
    }


    /**
     * Get method
     * View page add new room_type
     * @return view admin.room_type.add
     */
    public function create()
    {
        return view('admin.room_type.add');
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view back() with success| back() with error
     */
    public function store(RoomTypeRequest $request)
    {
        $roomType = new RoomType();
        try {

            $roomType->create($request->all());
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Loại phòng đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }

        return redirect()->back()->with('success', 'Thêm loại phòng thành công');
    }
    /**
     * Post method
     * Ajax for field has Unique constraint
     * @param array $room_type
     * @return json|text|mixed pass||error
     */
    public function checkUnique(Request $roomType)
    {
        $result = RoomType::all();
        echo $result;
    }
    /**
     * Get method
     * @param $id
     * @return view admin.room_type.edit with infomation that owned by room_type has that id
     */
    public function edit($id)
    { 
        $roomType = RoomType::find($id);
        //dd($roomType);
        return view('admin.room_type.edit', ['roomType' => $roomType]);
    }


    /**
     * @param $id
     * @param @param Illuminate\Http\Request
     * @return view
     */
    public function update($id, RoomTypeRequest $request)
    {
       // dd($id, $request->all());
        try {
			$roomType = RoomType::find($id);
			$roomType->room_type = $request->room_type;
			$roomType->description = $request->description;
			$roomType->active = $request->active;
			$roomType->save();
		} catch (Exception $e) {
			if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Loại phòng đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
		}
        
        return back()->with('success','Sửa thành công');
    }

    /**
     * Post method
     * @param Request $id
     * @return view admin.room_type.index with success or error
     */
    public function delete($id)
    {
        try{
            $roomType = RoomType::where('id', $id)->delete();
        }
        catch(Exception $e)
        {
            return back()->with('errors', $e);
        }
        return back()->with('success','Thao tác thành công');
    }
}
