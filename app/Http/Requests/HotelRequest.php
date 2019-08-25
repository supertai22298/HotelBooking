<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'name' => 'required|min:4',
            'hotel_star' => 'required',
            'address' => 'required|min:6',
            'city' => 'required|min:3',
            'country' => 'required|min:3',
            'main_phone_number' => 'required|min:6|max:15',
            'company_email_address' => 'required|min:8|email',
            'image' => 'required|image|max:2048'
        ];
    }
    public function messages()
    {
        return [
            //
            'name.required' => 'Tên khách sạn không được để trống',
            'name.min' => 'Tên khách sạn không hợp lệ',

            'hotel_star.required' => 'Vui lòng nhập số sao',
            'address.required' => 'Địa chỉ không được để trống',

            'city.required' => 'Thành phố không được để trống',
            'city.min' => 'Thành phố không hợp lệ',

            'country.required' => 'Quốc gia không được để trống',
            'country.min' => 'Quốc gia không hợp lệ',

            'main_phone_number.min' => 'Số điện thoại không hợp lệ',
            'main_phone_number.max' => 'Số điện thoại không hợp lệ',
            'main_phone_number.required' => 'Số điện thoại không hợp lệ',

            'company_email_address.required' => 'Email không hợp lệ',
            'company_email_address.min' => 'Email không hợp lệ',
            'company_email_address.email' => 'Email không hợp lệ',

            'image.required' => 'Hình ảnh không hợp lệ',
            'image.image' => 'Hình ảnh không hợp lệ',
            'image.max' => 'Kích thước hình ảnh nhỏ hơn 2048kb',

        ];
    }
}
