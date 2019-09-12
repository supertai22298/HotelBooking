<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'password' => 'required',
            'new_password' => 'required|min:2|max:35',
            'cfnew_password' => 'required|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu không được để trống',

            'new_password.required' => 'Mật khẩu mới không được để trống',
            'new_password.min' => 'Mật khẩu quá đơn giản',
            'new_password.max' => 'Mật khẩu quá dài',

            'cfnew_password.required' => 'Mật khẩu mới không được để trống',
            'cfnew_password.same' => 'Không khớp mật khẩu',
        ];
    }
}
