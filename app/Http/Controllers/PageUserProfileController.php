<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserProfileRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PageUserProfileController extends Controller
{
    public function view()
    {
        return view('page.user.user_profile');
    }

    public function update(UserProfileRequest $request)
    {

        if (Auth::check()) {
            $user = User::find(Auth::user()->id);

            $helper = new Helper;
            $avatarName = $user->avatar;
            //nếu tồn tại file gửi lên mới xóa file cũ và upload file mới.
            if ($request->file('avatar')) {
                $helper->deleteFile($avatarName);
                $avatarName = $helper->uploadFile($request->file('avatar'));
            }

            $arrName = explode(' ', $request->name);
            $last_name = end($arrName);

            //update
            $user->last_name = $last_name;
            $user->first_name = str_replace(' ' . $last_name, '', $request->name); // lấy đối tượng first name từ string name
            $user->date_of_birth = $request->date_of_birth;
            $user->avatar = $avatarName;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->address = $request->address;
            $user->country = $request->country;
            $user->description = $request->description;

            $user->save();

            $result = User::find(Auth::user()->id);

            return  $result;
        } else {
            return redirect('/login')->with('msg', 'Hãy đăng nhập để dùng tính năng này');
        }
    }

    public function editPassword()
    {
        return view('page.user.edit_password');
    }

    public function updatePassword(ChangePasswordRequest $request)
    {
        if (Auth::check()) {
            $user = User::find(Auth::user()->id);
            if (Hash::check($request->password, $user->password)) {
                $user->password = bcrypt($request->new_password);
                $user->save();
                return 'Thay đổi mật khẩu thành công';
            } else {
                return 'Hãy nhập đúng mật khẩu hiện tại';
            }
        } else {
            return redirect('/login')->with('msg', 'Hãy đăng nhập để dùng tính năng này');
        }
    }
}
