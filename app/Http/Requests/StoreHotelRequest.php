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
            'image' => 'nullable|image',
            'country' => 'required|max:60',
            'province' => 'required|max:70',
            'city' => 'required |max:70',
            'address' => 'required|max:80',
            'postcode' => 'required|max:8',
        ];
    }
}
