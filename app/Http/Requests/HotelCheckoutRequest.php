<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelCheckoutRequest extends FormRequest
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
            'first_name'    => 'sometimes:'.auth()->id().'|required|string|max:255',
            'last_name'     => 'sometimes:'.auth()->id().'|required|string|max:255',
            'email'         => 'sometimes:'.auth()->id().'|required|string|email|max:255|unique:users',
            'telephone'     => 'sometimes:'.auth()->id().'|required|string|max:15',
            'address'       => 'string|max:255|nullable',
            'postcode'      => 'string|max:50|nullable',
            'city'          => 'string|max:50|nullable',
            'region_state'  => 'string|max:50|nullable',
            'country'       => 'string|max:50|nullable',
        ];
    }
}
