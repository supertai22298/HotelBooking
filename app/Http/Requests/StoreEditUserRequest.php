<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEditUserRequest extends FormRequest
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
            'email'     => 'required|email',

            'password'  => [
                'min:3',
                'max:35',
                'nullable',
            ],

            'first_name'    => 'required|min:2',

            'last_name'     => 'required|min:2',

            'gender'        => 'regex:/[0-1]{1}/',

            'role'          => 'regex:/[0-1]{1}/',

            'active'        => 'regex:/[0-1]{1}/',

            'city'          => 'min:2|nullable',

            'country'       => 'min:2|nullable',

            'date_of_birth' => 'before:today|nullable',

            'phone_number'  => 'nullable|regex:/[0-9]/|max:11',

            'avatar'        => 'image',
        ];
    }
    public function messages()
    {
        return [
            'email.required'        => 'Email không được để trống',
            'email.email'           => 'Email không hợp lệ',

            'password.min'      => 'Mật khẩu quá ngắn',
            'password.max'      => 'Mật khẩu quá dài',

            'first_name.required'   => 'Họ không được để trống',
            'first_name.min'        => 'Họ quá ngắn',

            'last_name.required'    => 'Tên không được để trống',
            'last_name.min'         => 'Tên quá ngắn',

            'date_of_birth.before'  => 'Ngày sinh không hợp lệ',

            'phone_number.regex'    => 'Số điện thoại không hợp lệ',
            'phone_number.max'    => 'Số điện thoại không hợp lệ',

            'gender.regex'        => 'Giới tính không hợp lệ',

            'role.regex'          => 'Quyền không hợp lệ',

            'active.regex'        => 'Trạng thái không hợp lệ',

            'city.min'              => 'Tên thành phố không hợp lệ',

            'country.min'           => 'Tên quốc gia không hợp lệ',

            'avatar.image'          => 'Ảnh đại diện không hợp lệ',
        ];
    }
}
