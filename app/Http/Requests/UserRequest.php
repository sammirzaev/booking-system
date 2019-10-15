<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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

        $validator->sometimes('email', 'required|string|email|max:255|unique:users', function ($input) {

            if($this->route()->getActionMethod() == 'update'){
                if ($input->email === $this->user->email){
                    return false;
                }
                return true;
            }
            return true;
        });
        $validator->sometimes('password', 'required|string|min:8|confirmed', function ($input) {

            return !($this->route()->getActionMethod() == 'update') ?? $input->password;
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
            'first_name'    => 'required|string|max:255',
            'last_name'     => 'required|string|max:255',
            'telephone'     => 'required|string|max:15',
            'address'       => 'string|max:255|nullable',
            'postcode'      => 'string|max:50|nullable',
            'city'          => 'string|max:50|nullable',
            'region_state'  => 'string|max:50|nullable',
            'country'       => 'string|max:50|nullable',
        ];
    }
}
