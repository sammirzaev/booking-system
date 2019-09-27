<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use App\Location;
use App\HotelType;
use App\HotelBonus;
use App\HotelFacility;
use App\HotelSurround;
use App\Http\Requests\HotelRequest;

class HotelController extends AdminController
{
    /**
     * @var Hotel
     */
    protected $hotel;

    /**
     * @var HotelType
     */
    private $hotelType;

    /**
     * @var HotelFacility
     */
    private $hotelFacility;

    /**
     * @var HotelSurround
     */
    private $hotelSurround;

    /**
     * @var HotelBonus
     */
    private $hotelBonus;

    /**
     * @var Location
     */
    private $location;

    /**
     * HotelController constructor.
     * @param Hotel $hotel
     * @param HotelType $hotelType
     * @param HotelFacility $hotelFacility
     * @param HotelSurround $hotelSurround
     * @param HotelBonus $hotelBonus
     * @param Location $location
     */
    public function __construct(Hotel $hotel, HotelType $hotelType, HotelFacility $hotelFacility, HotelSurround $hotelSurround, HotelBonus $hotelBonus, Location $location)
    {
        $this->hotel = $hotel;
        $this->location = $location;
        $this->hotelType = $hotelType;
        $this->hotelBonus = $hotelBonus;
        $this->hotelFacility = $hotelFacility;
        $this->hotelSurround = $hotelSurround;

        parent::__construct();
        $this->title = 'Hotel';
        $this->breadcrumbs = [['route' => route('admin.hotel.index'), 'item' => 'Hotel']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('hotels', $this->hotel->all()->load('language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view
            ->with('hotelBonuses', $this->hotelBonus->all()->load('language'))
            ->with('locations', $this->location->all()->load('language'))
            ->with('hotelTypes', $this->hotelType->all()->load('language'))
            ->with('hotelFacilities', $this->hotelFacility->all()->load('language'))
            ->with('hotelSurrounds', $this->hotelSurround->all()->load('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  HotelRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HotelRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Hotel $hotel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Hotel $hotel)
    {
        return $this->view
            ->with('hotel', $hotel)
            ->with('locations', $this->location->all()->load('language'))
            ->with('hotelTypes', $this->hotelType->all()->load('language'))
            ->with('hotelFacilities', $this->hotelFacility->all()->load('language'))
            ->with('hotelSurrounds', $this->hotelSurround->all()->load('language'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Hotel $hotel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Hotel $hotel)
    {
        return $this->view
            ->with('hotel', $hotel)
            ->with('locations', $this->location->all()->load('language'))
            ->with('hotelTypes', $this->hotelType->all()->load('language'))
            ->with('hotelFacilities', $this->hotelFacility->all()->load('language'))
            ->with('hotelSurrounds', $this->hotelSurround->all()->load('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  HotelRequest $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(HotelRequest $request, Hotel $hotel)
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
