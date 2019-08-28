<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'room_type_id' => 'required',
            'room_status_id' => 'required',
            'name' => 'required|min:3',
            'floor' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'image' => 'nullable|image',
        ];
    }
}
