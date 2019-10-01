<?php

namespace App\Http\Requests;

use Carbon\Carbon;
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
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('detailCurrentDateStart', 'required|date_format:Y-m-d|after:'. Carbon::today()->toDateString(), function ($input) {
            return !($this->route()->getActionMethod() == 'update') ?? $input->detailCurrentDateStart;
        });
        $validator->sometimes('detailCurrentDateEnd', 'required|date_format:Y-m-d|after:detailCurrentDateStart|before:'. Carbon::today()->addDays(config('booking.room.admin.max_booking_range_day'))->toDateString(), function ($input) {
            return !($this->route()->getActionMethod() == 'update') ?? $input->detailCurrentDateEnd;
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
            // room
            'hotel'         => 'required|integer',
            'mainSort'      => 'integer|nullable',
            'mainPrice'     => 'required|numeric|max:1000000',
            'mainNotes'     => 'sometimes|string|nullable',

            'mainBookingOption'         => 'sometimes|integer|nullable',
            'mainPaymentType'           => 'required_if:mainBookingOption,1|integer|nullable',
            'mainBookingValue'          => 'required_with:mainPaymentType|nullable|numeric|max:1000000',
            'mainCancelBookingValue'    => 'sometimes|numeric|nullable',
            'mainDiscountValue'         => 'sometimes|numeric|nullable',

            // room_type
            'roomType'      => 'required|integer',

            // room_languages
            'mainDescription.*' => 'required|string',

            // room_images
            'mediaUploaded.*' => 'mimetypes:video/avi,video/mpeg,video/quicktime,image/bmp,image/gif,image/jpeg,image/png|max:10240',

            // room_detail
            'detailAdults'          => 'sometimes|required|integer',
            'detailChildren'        => 'sometimes|integer|nullable',
            'detailBeds'            => 'sometimes|integer|nullable',
            'detailFootage'         => 'sometimes|integer|nullable',

//            'detailCurrentDateStart'    => 'required|date_format:Y-m-d|after:'. Carbon::today()->toDateString(),
//            'detailCurrentDateEnd'      => 'required|date_format:Y-m-d|after:detailCurrentDateStart|before:'. Carbon::today()->addDays(config('booking.room.admin.max_booking_range_day'))->toDateString(),

        ];
    }
}
