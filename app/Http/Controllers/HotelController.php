<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Location;
use Illuminate\Http\Request;

class HotelController extends FrontendController
{
    /**
     * @var Hotel
     */
    private $hotel;

    /**
     * @var Location
     */
    protected $location;

    /**
     * HotelController constructor.
     *
     * @param Hotel $hotel
     * @param Location $location
     */
    public function __construct(Hotel $hotel, Location $location)
    {
        $this->hotel = $hotel;
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hotel.index')
            ->with('hotels', $this->hotel->paginate(config('paginate.user.all_hotels'))
                ->load('language', 'image', 'bonuses'))
            ->with('locations', $this->location->all()->load('language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
