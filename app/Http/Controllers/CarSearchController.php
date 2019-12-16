<?php

namespace App\Http\Controllers;

use App\Car;
use App\Location;
use Carbon\Carbon;
use App\CarAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarSearchController extends Controller
{
    /**
     * @var Car
     */
    private $car;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var CarAvailability
     */
    private $carAvailability;

    /**
     * CarSearchController constructor.
     * @param Car $car
     * @param CarAvailability $carAvailability
     * @param Location $location
     */
    public function __construct(Car $car, CarAvailability $carAvailability, Location $location)
    {
        $this->car = $car;
        $this->location = $location;
        $this->carAvailability = $carAvailability;
    }

    /**
     * Car availability check.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->isMethod('GET')
            && $request->input('car_id')
            && $request->input('adults')
            && $request->input('start_date')
            && $request->input('start_time')
            && $request->input('end_date')
            && $request->input('end_time'))
        {

            $validator = Validator::make($request->only('start_date', 'end_date'), [
                'start_date'   => 'required|after:'. Carbon::tomorrow()
                        ->toDateString(),
                'end_date'     => 'required|after:start_date|before:'. Carbon::tomorrow()
                        ->addDays(config('booking.car.user.max_booking_range_day'))
                        ->toDateString(),
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => trans('car/index.error')
                ]);
            }

            $carDetail = $this->car::where('id', $request->input('car_id'))
                                        ->active()
                                        ->where('adult_min', '>=', $request->input('adults'))
                                        ->get();

            if($carDetail->first()){

                $start_date = strtotime($request->input('start_date') .' '. $request->input('start_time'));
                $finish_date = strtotime($request->input('end_date') .' '. $request->input('end_time'));

                $carAvailability = $this->carAvailability::where('car_id', $request->input('car_id'))
                                                            ->whereNull('status')
                                                            ->whereBetween('date', [$start_date, $finish_date])
                                                            ->count();

                $elapsed = ($finish_date - $start_date) / 3600;

                if($carAvailability === $elapsed){
                    return response()->json([
                        'status' => true
                    ]);
                }
            }
        }
        return response()->json([
            'error' => trans('car/index.error')
        ]);
    }
}
