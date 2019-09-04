<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminLoginRequest extends FormRequest
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
            'username'  => ['required',
                            'min:3',
                            'max:255',
                            'regex:/^(\w)+$/i',
            ],
            'password'  => ['required',
                            'min:3',
                            'max:35',
            ],
        ];
    }

    public function messages()
    {
        return [
            'username.required'     => 'Tên tài khoản không được để trống',
            'username.min'          => 'Tên tài khoản phải dài hơn 3 kí tự',
            'username.max'          => 'Tên tài khoản không dài quá 255 kí tự',
            'username.regex'        => 'Tên tài khoản không hợp lệ',

            'password.required'     => 'Mật khẩu không được để trống',
            'password.min'          => 'Mật khẩu quá ngắn',
            'password.max'          => 'Mật khẩu quá dài',
        ];
    }
}
