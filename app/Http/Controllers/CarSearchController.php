<?php

namespace App\Http\Controllers;

use App\Car;
use App\Location;
use App\CarAvailability;
use Illuminate\Http\Request;
use App\Http\Traits\CarCheck;

class CarSearchController extends Controller
{
    use CarCheck;

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
        if($this->checkAviabilty($request))
        {
            return response()->json([
                'status' => true
            ]);
        }
        return response()->json([
            'error' => trans('car/index.error')
        ]);
    }
}
