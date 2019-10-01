<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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

//        hotel
        $validator->sometimes('mainPriceTo', 'nullable|numeric|max:1000000', function ($input) {
            return !empty($input->mainPriceTo) ?? $input->mainPriceTo;
        });
        $validator->sometimes('mainCheckin', 'date_format:H:i', function ($input) {
            return !empty($input->mainCheckin) ?? $input->mainCheckin;
        });
        $validator->sometimes('mainCheckout', 'date_format:H:i', function ($input) {
            return !empty($input->mainCheckout) ?? $input->mainCheckout;
        });
        $validator->sometimes('mainStatus', 'integer|nullable', function ($input) {
            return !empty($input->mainStatus) ?? $input->mainStatus;
        });
        $validator->sometimes('mainBookingDay', 'integer|nullable', function ($input) {
            return !empty($input->mainBookingDay) ?? $input->mainBookingDay;
        });
        $validator->sometimes('mainCancelDay', 'integer|nullable', function ($input) {
            return !empty($input->mainCancelDay) ?? $input->mainCancelDay;
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
//            hotel
            'mainStar'          => 'integer|nullable',
            'mainPriceFrom'     => 'required|numeric|max:1000000',
            'mainSort'          => 'integer|nullable',
//            'locationLatitude' => '',
//            'locationLongitude' => '',

//            hotel_languages
            'mainTitle.*'       => 'required|max:255',
            'mainAddress.*'     => 'required|max:255',
            'mainDescription.*' => 'required|string',

//            hotel_images
//            'mediaUploaded.*'   => 'mimes:jpg,jpeg,bmp,png,avi,mpg|size:10240',
            'mediaUploaded.*'   => 'mimetypes:video/avi,video/mpeg,video/quicktime,image/bmp,image/gif,image/jpeg,image/png|max:10240',

//            hotel_location
//            'locationId.*'      => 'required|integer',

//            hotel_type
//            'hotelTypes.*'      => 'integer',

//            hotel_facility
//            'hotelFacilities.*' => 'integer',

//            hotel_surround
//            'hotelSurroundsName.*' => 'string',
//            'hotelSurroundsDistance.*' => '',
//            'hotelSurroundsLatitude.*' => '',
//            'hotelSurroundsLongitude.*' => '',
        ];
    }
}
