<?php

namespace App\Http\Controllers;

use App\Location;

class IndexController extends FrontendController
{
    /**
     * @var Location
     */
    protected $location;

    /**
     * LocationController constructor.
     * @param Location $location
     */
    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index.index')->with('locations', $this->location->all()->load('language'));
    }
}
