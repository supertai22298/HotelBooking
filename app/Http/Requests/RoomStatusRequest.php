<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomStatusRequest extends FormRequest
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
            'room_status' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'room_status.required' => 'Tình trạng phòng tối thiếu 6 ký tự',
            'room_status.min' => 'Tình trạng phòng tối thiếu 6 ký tự'
        ];
    }
}
