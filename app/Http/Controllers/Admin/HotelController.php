<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use App\Location;
use App\HotelType;
use App\HotelBonus;
use App\HotelFacility;
use App\HotelSurround;
use Illuminate\Support\Facades\DB;
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
            ->with('locations', $this->location->all()->load('language'))
            ->with('hotelTypes', $this->hotelType->all()->load('language'))
            ->with('hotelBonuses', $this->hotelBonus->all()->load('language'))
            ->with('hotelFacilities', $this->hotelFacility->all()->load('language'))
            ->with('hotelSurrounds', $this->hotelSurround->all()->load('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HotelRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(HotelRequest $request)
    {
        $this->hotel->star          = $request->input('mainStar');
        $this->hotel->price_from    = $request->input('mainPriceFrom');
        $this->hotel->price_to      = $request->input('mainPriceTo');
        $this->hotel->check_in      = $request->input('mainCheckin');
        $this->hotel->check_out     = $request->input('mainCheckout');
        $this->hotel->status        = $request->input('mainStatus');
        $this->hotel->sort          = $request->input('mainSort');
        $this->hotel->order_day     = $request->input('mainBookingDay');
        $this->hotel->cancel_day    = $request->input('mainCancelDay');
        $this->hotel->latitude      = $request->input('locationLatitude');
        $this->hotel->longitude     = $request->input('locationLongitude');

        DB::beginTransaction();
        if ($this->hotel->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("mainTitle.$lang"),
                    'address' => $request->input("mainAddress.$lang"),
                    'description' => $request->input("mainDescription.$lang"),
                    'hotel_id' => $this->hotel->id
                ];
            }

            if ($this->hotel->languages()->createMany($languages)){

                if ($request->hasFile("mediaUploaded")){
                    $mediaUploaded = [];
                    foreach ($request->file("mediaUploaded") as $media){
                        $upload = $media->store('hotels', 'public');

                        if($upload){
                            $mediaUploaded[] = [
                                'name' => str_replace('hotels/', '', $upload),
                                'type' => $media->getMimeType(),
                                'hotel_id' => $this->hotel->id
                            ];
                        }
                        if($media->isFile()){
                            unlink($media->getRealPath());
                        }
                    }
                    $this->hotel->images()->createMany($mediaUploaded);
                }
                if ($request->input("locationId")){
                    $this->hotel->locations()->sync($request->input("locationId"));
                }
                if ($request->input("hotelTypes")){
                    $hotelTypes = [];
                    foreach ($request->input("hotelTypes") as $key => $item){
                        array_push($hotelTypes, $key);
                    }
                    $this->hotel->types()->sync($hotelTypes);
                }
                if ($request->input("hotelFacilities")){
                    $hotelFacilities = [];
                    foreach ($request->input("hotelFacilities") as $key => $item){
                        array_push($hotelFacilities, $key);
                    }
                    $this->hotel->facilities()->sync($hotelFacilities);
                }
                if ($request->input("hotelSurroundsName")){
                    $hotelSurrounds = [];
                    foreach ($request->input("hotelSurroundsName") as $key => $hotelSurroundsName){
                        if($hotelSurroundsName){
                            $hotelSurrounds[$key] = [
                                'name'      => $hotelSurroundsName,
                                'distance'  => $request->input("hotelSurroundsDistance.$key"),
                                'latitude'  => $request->input("hotelSurroundsLatitude.$key"),
                                'longitude' => $request->input("hotelSurroundsLongitude.$key")
                            ];
                        }
                    }
                    if(current($hotelSurrounds)){
                        $this->hotel->surrounds()->sync($hotelSurrounds);
                    }
                }
                if ($request->input("hotelBonuses")){
                    $hotelBonuses = [];
                    foreach ($request->input("hotelBonuses") as $key => $item){
                        array_push($hotelBonuses, $key);
                    }
                    $this->hotel->bonuses()->sync($hotelBonuses);
                }
                DB::commit();
                return redirect()->route('admin.hotel.index')->with(['status' => 'Hotel saved successfully']);
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param Hotel $hotel
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Hotel $hotel)
    {
        //
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
            ->with('hotelBonuses', $this->hotelBonus->all()->load('language'))
            ->with('hotelFacilities', $this->hotelFacility->all()->load('language'))
            ->with('hotelSurrounds', $this->hotelSurround->all()->load('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HotelRequest $request
     * @param Hotel $hotel
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(HotelRequest $request, Hotel $hotel)
    {
        $hotel->star          = $request->input('mainStar');
        $hotel->price_from    = $request->input('mainPriceFrom');
        $hotel->price_to      = $request->input('mainPriceTo');
        $hotel->check_in      = $request->input('mainCheckin');
        $hotel->check_out     = $request->input('mainCheckout');
        $hotel->status        = $request->input('mainStatus');
        $hotel->sort          = $request->input('mainSort');
        $hotel->order_day     = $request->input('mainBookingDay');
        $hotel->cancel_day    = $request->input('mainCancelDay');
        $hotel->latitude      = $request->input('locationLatitude');
        $hotel->longitude     = $request->input('locationLongitude');

        DB::beginTransaction();
        if ($hotel->update()) {
            foreach (config('settings.locales') as $lang) {
                $hotel->language()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("mainTitle.$lang"),
                        'address' => $request->input("mainAddress.$lang"),
                        'description' => $request->input("mainDescription.$lang"),
                    ]);
            }
            if ($request->hasFile("mediaUploaded")){
                $mediaUploaded = [];
                foreach ($request->file("mediaUploaded") as $media){
                    $upload = $media->store('hotels', 'public');

                    if($upload){
                        $mediaUploaded[] = [
                            'name' => str_replace('hotels/', '', $upload),
                            'type' => $media->getMimeType(),
                            'hotel_id' => $hotel->id
                        ];
                    }
                    if($media->isFile()){
                        unlink($media->getRealPath());
                    }
                }
                $hotel->images()->createMany($mediaUploaded);
            }
            if ($request->input("locationId")){
                $hotel->locations()->sync($request->input("locationId"));
            }
            if ($request->input("hotelTypes")){
                $hotelTypes = [];
                foreach ($request->input("hotelTypes") as $key => $item){
                    array_push($hotelTypes, $key);
                }
                $hotel->types()->sync($hotelTypes);
            }
            else{
                $hotel->types()->detach();
            }
            if ($request->input("hotelFacilities")){
                $hotelFacilities = [];
                foreach ($request->input("hotelFacilities") as $key => $item){
                    array_push($hotelFacilities, $key);
                }
                $hotel->facilities()->sync($hotelFacilities);
            }
            else{
                $hotel->facilities()->detach();
            }
            if ($request->input("hotelSurroundsName")){
                $hotelSurrounds = [];
                foreach ($request->input("hotelSurroundsName") as $key => $hotelSurroundsName){
                    if($hotelSurroundsName){
                        $hotelSurrounds[$key] = [
                            'name'      => $hotelSurroundsName,
                            'distance'  => $request->input("hotelSurroundsDistance.$key"),
                            'latitude'  => $request->input("hotelSurroundsLatitude.$key"),
                            'longitude' => $request->input("hotelSurroundsLongitude.$key")
                        ];
                    }
                }
                if(current($hotelSurrounds)){
                    $hotel->surrounds()->sync($hotelSurrounds);
                }
                else{
                    $hotel->surrounds()->detach();
                }
            }
            if ($request->input("hotelBonuses")){
                $hotelBonuses = [];
                foreach ($request->input("hotelBonuses") as $key => $item){
                    array_push($hotelBonuses, $key);
                }
                $hotel->bonuses()->sync($hotelBonuses);
            }
            else{
                $hotel->bonuses()->detach();
            }
                DB::commit();
                return redirect()->route('admin.hotel.index')->with(['status' => 'Hotel updated successfully']);
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Hotel $hotel
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Hotel $hotel)
    {
        if($this->useCheck($hotel) && $hotel->delete()){
            return redirect()->route('admin.hotel.index')->with('status', 'Hotel deleted successfully');
        }
        return back()->with('error', 'Error');
    }

    /**
     * Check location on used other Models
     *
     * @param Hotel $hotel
     * @return bool
     */
    protected function useCheck($hotel)
    {
        return true;
    }
}
