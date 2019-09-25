<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomStatusRequest;
use Illuminate\Http\Request;
use App\RoomStatus;

class RoomStatusController extends Controller
{
    /**
     * Get method
     * View table room_statuss
     * @return view admin.room_status.index
     */
    public function view()
    {
        $roomStatuses = RoomStatus::orderBy('created_at', 'desc')->get();
        return view('admin.room_status.index', ['roomStatuses' => $roomStatuses]);
    }


    /**
     * Get method
     * View page add new room_status
     * @return view admin.room_status.add
     */
    public function create()
    {
        return view('admin.room_status.add');
    }

    /**
     * Post method
     * @param Illuminate\Http\Request
     * @return view back() with success| back() with error
     */
    public function store(RoomStatusRequest $request)
    {
        $roomStatus = new RoomStatus();
        try {

            $roomStatus->create($request->all());
        } catch (Exception $e) {
            if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Tình trạng phòng đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }

        return redirect()->back()->with('success', 'Thêm loại phòng thành công');
    }
    /**
     * Get method
     * @param $id
     * @return view admin.room_status.edit with infomation that owned by room_status has that id
     */
    public function edit($id)
    { 
        $roomStatus = RoomStatus::find($id);
        //dd($roomStatus);
        return view('admin.room_status.edit', ['roomStatus' => $roomStatus]);
    }


    /**
     * @param $id
     * @param @param Illuminate\Http\Request
     * @return view
     */
    public function update($id, RoomStatusRequest $request)
    {
       // dd($id, $request->all());
        try {
			$roomStatus = RoomStatus::find($id);
			$roomStatus->room_status = $request->room_status;
			$roomStatus->description = $request->description;
			$roomStatus->active = $request->active;
			$roomStatus->save();
		} catch (Exception $e) {
			if (strpos($e->getMessage(), 'unique'))
                return back()->with('errorSQL', 'Tình trạng phòng đã tồn tại')->withInput();
            else
                return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
		}
        
        return back()->with('success','Sửa thành công');
    }

    /**
     * Post method
     * @param Request $id
     * @return view admin.room_status.index with success or error
     */
    public function delete($id)
    {
        try{
            $roomStatus = RoomStatus::where('id', $id)->delete();
        }
        catch(Exception $e)
        {
            return back()->with('errors', $e);
        }
        return back()->with('success','Thao tác thành công');
    }
}
