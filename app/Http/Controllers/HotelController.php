<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Room;
use App\Location;
use Illuminate\Http\Request;

class HotelController extends FrontendController
{
    /**
     * @var Hotel
     */
    private $hotel;

    /**
     * @var Room
     */
    private $room;

    /**
     * @var Location
     */
    protected $location;

    /**
     * HotelController constructor.
     *
     * @param Hotel $hotel
     * @param Room $room
     * @param Location $location
     */
    public function __construct(Hotel $hotel, Room $room, Location $location)
    {
        $this->hotel = $hotel;
        $this->room = $room;
        $this->location = $location;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = $this->hotel::active()->paginate(config('paginate.user.hotels'));
        $hotels->load('language', 'image', 'bonuses');

        return view('hotel.index')
            ->with('hotels', $hotels)
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
//        $rooms = $hotel->rooms;
//        dd($rooms->load('language', ''));
        return view('hotel.show')
            ->with('hotel', $hotel->load('language', 'images', 'bonuses'))
            ->with('locations', $this->location->all()->load('language'));
//            ->with('rooms', $this->room->where('hotel_id')->load('language', 'images', 'bonuses'))
//            ;
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
