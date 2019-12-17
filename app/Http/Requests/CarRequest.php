<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarRequest extends FormRequest
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
//            main
            'title'     => 'required|string|max:255',
            'type'      => 'required|numeric',
            'sort'      => 'required|numeric',
            'status'    => 'required|numeric',
            'bags'      => 'required|numeric',
            'doors'     => 'required|numeric',
            'condition' => 'required|numeric',
            'adult_min' => 'required|numeric',
            'adult_max' => 'required|numeric',
            'price'     => 'required|numeric',

//            detail
            'detailCurrentDateStart' => 'required|date_format:Y-m-d',
            'detailCurrentDateEnd'   => 'required|date_format:Y-m-d',

//            media
            'media.*'   => 'mimetypes:video/avi,video/mpeg,video/quicktime,image/bmp,image/gif,image/jpeg,image/png|max:10240',

//            location
            'location'          => 'required|numeric',
            'locationLatitude'  => 'numeric|nullable',
            'locationLongitude' => 'numeric|nullable'
        ];
    }
}
