<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomImageRequest extends FormRequest
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
            //
            'images' => 'required'
        ];
    }
    public function messages()
    {
        return [
            //
            'images.required' => 'Hình ảnh không hợp lệ',
            'images.image' => 'Hình ảnh không hợp lệ'
        ];
    }
}
