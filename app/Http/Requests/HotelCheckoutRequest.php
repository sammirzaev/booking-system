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
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('first_name', 'required|string|max:255', function ($input) {
            return !(auth()->id()) ?? $input->first_name;
        });
        $validator->sometimes('last_name', 'required|string|max:255', function ($input) {
            return !(auth()->id()) ?? $input->last_name;
        });
        $validator->sometimes('email', 'required|string|email|max:255|unique:users', function ($input) {
            return !(auth()->id()) ?? $input->email;
        });
        $validator->sometimes('telephone', 'required|string|max:15', function ($input) {
            return !(auth()->id()) ?? $input->telephone;
        });
        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'first_name'    => 'sometimes:'.auth()->id().'|required|string|max:255',
//            'last_name'     => 'sometimes:'.auth()->id().'|required|string|max:255',
//            'email'         => 'sometimes:'.auth()->id().'|required|string|email|max:255|unique:users',
//            'telephone'     => 'sometimes:'.auth()->id().'|required|string|max:15',
            'address'       => 'string|max:255|nullable',
            'postcode'      => 'string|max:50|nullable',
            'city'          => 'string|max:50|nullable',
            'region_state'  => 'string|max:50|nullable',
            'country'       => 'string|max:50|nullable',
        ];
    }
}
