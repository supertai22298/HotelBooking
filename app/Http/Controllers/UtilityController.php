<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Hotel;
use App\HotelUtility;
use App\Http\Requests\UtilityRequest;
use Exception;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    /**
     * Get method
     * @param int $hotel_id
     * @return view
     */
    public function create($hotel_id){

        $hotel = Hotel::findOrFail($hotel_id);
        return view('admin.utility.add', ['hotel' => $hotel]);
    }

    /**
     * Post method
     * @param int $hotel_id
     * @param Request $request
     * @return back with success| error
     */
    public function store($hotel_id, UtilityRequest $request){
        $utility = new HotelUtility();
        $imageName = 'default.png';

        try {
            $utility->hotel_id = $hotel_id;
            $utility->utility = request('utility');
            $utility->description = request('description');
            $utility->image_link = request('image_link');

            if($request->hasFile('image')){
                $helper = new Helper();
                $imageName = $helper->uploadFile(request('image'));
            }
            $utility->image = $imageName;
            $utility->save();
        }   
        catch (Exception $e) {
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return back()->with('success', 'Thêm mới thành công');
    }

    /**
     * Get method
     * @param int $id
     * @return view
     */
    public function edit($id){
        $utility = HotelUtility::findOrFail($id);
        return view('admin.utility.edit', ['utility' => $utility]);
    }

    /**
     * post method
     * @param int $id
     * @return back with success or error
     */
    public function update($id, UtilityRequest $request){

        try{
            $utility = HotelUtility::findOrFail($id);
            $imageName = $utility->image;
            if($request->hasFile('image')){
                $helper = new Helper();
                $imageName = $helper->uploadFile(request('image'));
            }
            $utility->image = $imageName;
            $utility->utility = request('utility');
            $utility->description = request('description');
            $utility->image_link = request('image_link');
            $utility->save();
        }catch(Exception $e){
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return back()->with('success', 'Chỉnh sửa thành công');
    }

    /**
     * Get method
     * @param int $id
     * @return back() with success or error
     */
    public function delete($id){
        try{
            $utility = HotelUtility::findOrFail($id);
            $utility->delete();
        }catch(Exception $e){
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return back()->with('success', 'Xoá thành công');
    }
}
