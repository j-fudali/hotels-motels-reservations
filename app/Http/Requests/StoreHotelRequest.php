<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:60',
            'description' => 'required|max:500',
            'image' => 'required|image',
            'country' => 'required',
            'province' => 'required',
            'city' => 'required|max:70',
            'address' => 'required|max:80',
        ];
    }
}
