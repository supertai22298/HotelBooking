<?php

namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\User;


class Helper{

    /**
     * uploadFile method
     * @param $imageFile
     * @return string
     */
    public function uploadFile(UploadedFile $imageFile = null)
    {
        $avatarName = "default.png";
        if ($imageFile) {
            // get file original extention
            $avatarExtention = $imageFile->getClientOriginalExtension();
            // new file name
            $avatarName = date('Y-M-D') . '_' . round(microtime(true) * 1000) . '.' . $avatarExtention;
            // move file
            $imageFile->move('uploads/images/', $avatarName);
        }
        return $avatarName;
    }

    /**
     * get arr input method
     * @param $request
     * @return arr
     */
    public static function getArrInput(Request $request)
    {

        $imageFile = $request->file('avatar');

        // uploadFile
        $helper = new Helper;
        $avatarName = $helper->uploadFile($imageFile);

        // get arr input
        $arrInput = $request->all();
        if($arrInput['password']!=null){
        $arrInput['password'] = bcrypt($arrInput['password']);
        }
        $arrInput['avatar'] = $avatarName;

        return $arrInput;
    }

    public static function update($id,Request $request)
    {
        $user = User::find($id);
        // call funtion get arr input from app\heplers\helper
        $helper = new Helper;
        $input = $helper->getArrInput($request);

        // nếu mật khẩu null thì không đổi mật khẩu;
        if($input['password']==null){
            $input['password'] = $user['password'];
        }
        // nếu avatar là ảnh mặt định thì không đổi avatars;
        if($input['avatar']== 'default.png'){
            $input['avatar'] = $user['avatar'];
        }

        $user->update($input);
    }
}
