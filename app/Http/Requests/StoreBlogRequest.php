<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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
            'title' => 'required|min:2|max:100',

            'author' => 'required|min:2|max:50',

            'active'        => 'regex:/[0-1]{1}/',

            'description' => 'required|min:20',

            'image' => 'image',
        ];
    }
    public function messages()
    {
        return [
            'title.required'    => 'Tiêu đề không được để trống',
            'title.min'         => 'Tiêu đề không được quá ngắn',
            'title.max'         => 'Tiêu đề không được quá dài',

            'author.min'        => 'Tên tác giả không hợp lệ',
            'author.max'        => 'Tên tác giả không hợp lệ',
            'author.required'   => 'Tên tác giả không để trống',

            'active.regex'   => 'Trạng thái không hợp lệ',

            'image.image'       => 'Hình ảnh không hợp lệ',

            'description.required'  => 'Nội dung không được bỏ trống',
            'description.min'       => 'Nội dung hơi ngắn',
        ];
    }
}
