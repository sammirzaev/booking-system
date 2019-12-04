<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Location;

class IndexController extends FrontendController
{
    /**
     * @var Location
     */
    protected $location;

    /**
     * @var Hotel
     */
    private $hotel;

    /**
     * IndexController constructor.
     * @param Location $location
     * @param Hotel $hotel
     */
    public function __construct(Location $location, Hotel $hotel)
    {
        $this->location = $location;
        $this->hotel = $hotel;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $hotels = $this->hotel::active()->paginate(config('paginate.user.hotels'));
        $hotels->load('language', 'image', 'bonuses');

        return view('index.index')
            ->with('locations', $this->location->all()->load('language'))
            ->with('hotels', $hotels);
    }
}
