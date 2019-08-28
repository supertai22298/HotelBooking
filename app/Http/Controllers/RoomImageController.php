<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\RoomImageRequest;
use App\RoomImage;
use Exception;
use Illuminate\Http\Request;

class RoomImageController extends Controller
{
    //
    public function uploadMultiImage($room_id, RoomImageRequest $request){
        
        try{
            if($request->hasFile('images')){
                
                foreach($request->images as $fileImage){
                    $imageName = 'default.png';
                    $helper = new Helper();
                    $imageName = $helper->uploadFile($fileImage);

                    $roomImage = new RoomImage();
                    $roomImage->room_id = $room_id;
                    $roomImage->image = $imageName;
                    $roomImage->image_link = '';
                    $roomImage->save();
                }
            }
        }catch(Exception $ex){
            return back()->with('errorSQL', 'Có lỗi xảy ra')->withInput();
        }
        return back()->with('success', 'Thêm hình ảnh thành công');
    }

    public function delete($id){
        try{
            $roomImage = RoomImage::findOrFail($id);
            $roomImage->delete();
        }catch(Exception $ex){
            return back()->with('errorSQL', 'Có lỗi xảy ra');
        }
        return back()->with('success', 'Thao tác thành công');
    }
}
