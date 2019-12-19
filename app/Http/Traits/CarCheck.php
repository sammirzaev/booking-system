<?php

namespace App\Http\Traits;

use App\Car;
use Carbon\Carbon;
use App\CarAvailability;
use Illuminate\Support\Facades\Validator;

trait CarCheck
{
    /**
     * @param $request
     * @return bool
     */
    private function checkAviabilty($request)
    {
        if(request()->isMethod('GET')
            && $request->input('car')
            && $request->input('adults')
            && $request->input('start_date')
            && $request->input('start_time')
            && $request->input('end_date')
            && $request->input('end_time'))
        {

            $validator = Validator::make($request->only('start_date', 'end_date'), [
                'start_date' => 'required|after:'. Carbon::tomorrow()
                        ->toDateString(),
                'end_date' => 'required|after:start_date|before:'. Carbon::tomorrow()
                        ->addDays(config('booking.car.user.max_booking_range_day'))
                        ->toDateString(),
            ]);

            if ($validator->fails()) {
                return false;
            }

            $carDetail = Car::where('id', $request->input('car'))
                ->active()
                ->where('adult_max', '>=', $request->input('adults'))
                ->get();
            if($carDetail->first()){

                $start_date = strtotime($request->input('start_date') .' '. $request->input('start_time'));
                $finish_date = strtotime($request->input('end_date') .' '. $request->input('end_time')) - 3600;

                $carAvailability = CarAvailability::where('car_id', $request->input('car'))
                    ->whereNull('status')
                    ->whereBetween('date', [$start_date, $finish_date])
                    ->count();

                $elapsed = ($finish_date - $start_date) / 3600 + 1;

                if($carAvailability === $elapsed){
                    return true;
                }
            }
        }
        return false;
    }
}
