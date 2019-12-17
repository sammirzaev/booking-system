<?php

namespace App\Http\Controllers;

use App\Car;
use App\Location;

class CarController extends Controller
{
    /**
     * @var Car
     */
    private $car;

    /**
     * @var Location
     */
    private $location;

    /**
     * CarController constructor
     * @param Car $car
     * @param Location $location
     */
    public function __construct(Car $car, Location $location)
    {
        $this->car = $car;
        $this->location = $location;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search()
    {
        $cars = $this->car::active()->paginate(config('paginate.user.cars'));

        return view('car.index')
            ->with('cars', $cars)
            ->with('locations', $this->location->all()->load('language'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = $this->car::active()->paginate(config('paginate.user.cars'));

        return view('car.index')
            ->with('cars', $cars)
            ->with('locations', $this->location->all()->load('language'));
    }
}
