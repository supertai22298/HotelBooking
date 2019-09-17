<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'    => 'min:5',

            'gender'        => 'regex:/[0-1]{1}/',

            'address'          => 'min:2|nullable',

            'country'       => 'min:2|nullable',

            'date_of_birth' => 'before:today',

            'email'     => 'required|email',

            'phone_number'  => 'nullable|regex:/[0-9]/|max:11',

            'avatar'        => 'image',

            'description'   => 'nullable',

        ];
    }
    public function messages()
    {
        return [
            'name.min'   => 'Họ và tên không được để trống',

            'date_of_birth.before'  => 'Ngày sinh không hợp lệ',

            'phone_number.regex'  => 'Số điện thoại không hợp lệ',
            'phone_number.max'  => 'Số điện thoại không hợp lệ',

            'gender.regex'        => 'Giới tính không hợp lệ',

            'address.min'           => 'Tên địa chỉ không hợp lệ',

            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Email không hợp lệ',

            'country.min'           => 'Quốc tịch không hợp lệ',

            'avatar.image'          => 'Ảnh đại diện không hợp lệ',

            'description.regex'   => 'Nội dung khôn hợp lệ',
        ];
    }
}
