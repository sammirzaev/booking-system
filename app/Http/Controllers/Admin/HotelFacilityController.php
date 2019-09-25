<?php

namespace App\Http\Controllers\Admin;

use App\HotelFacility;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HotelFacilityRequest;

class HotelFacilityController extends AdminController
{
    /**
     * @var HotelFacility
     */
    protected $hotelFacility;

    /**
     * HotelFacilityController constructor.
     * @param HotelFacility $hotelFacility
     */
    public function __construct(HotelFacility $hotelFacility)
    {
        $this->hotelFacility = $hotelFacility;
        parent::__construct();
        $this->title = 'Hotel Facility';
        $this->breadcrumbs = [['route' => route('admin.hotel.facility.index'), 'item' => 'Hotel Facility']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('hotelFacilities', $this->hotelFacility->all()->load('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view->with('hotelFacilities', $this->hotelFacility->all()->load('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HotelFacilityRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(HotelFacilityRequest $request)
    {
        $this->hotelFacility->icon = $request->input('icon');
        $this->hotelFacility->parent_id = $request->input('parent');
        $this->hotelFacility->sort = $request->input('sort');

        DB::beginTransaction();
        if ($this->hotelFacility->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'hotel_facility_id' => $this->hotelFacility->id
                ];
            }
            if ($this->hotelFacility->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.hotel.facility.index')->with('status', 'Hotel facility saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param HotelFacility $hotelFacility
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(HotelFacility $hotelFacility)
    {
        return $this->view->with('hotelFacility', $hotelFacility);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HotelFacility $hotelFacility
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(HotelFacility $hotelFacility)
    {
        return $this->view->with('hotelFacility', $hotelFacility)
            ->with('hotelFacilities', $this->hotelFacility->all()->load('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HotelFacilityRequest $request
     * @param HotelFacility $hotelFacility
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(HotelFacilityRequest $request, HotelFacility $hotelFacility)
    {
        $hotelFacility->icon = $request->input('icon');
        $hotelFacility->parent_id = $request->input('parent');
        $hotelFacility->sort = $request->input('sort');

        DB::beginTransaction();
        if ($hotelFacility->update()) {
            foreach (config('settings.locales') as $lang) {
                $hotelFacility->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.hotel.facility.index')->with('status', 'Hotel facility updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HotelFacility $hotelFacility
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(HotelFacility $hotelFacility)
    {
        if($this->useCheck($hotelFacility) && $hotelFacility->delete()){
            return redirect()->route('admin.hotel.facility.index')->with('status', 'Hotel facility deleted successfully');
        }
        return back()->with('error', 'Error');
    }

    /**
     * Check location on used other Models
     *
     * @param HotelFacility $hotelFacility
     * @return bool
     */
    protected function useCheck($hotelFacility)
    {
        if(current($this->hotelFacility->where('parent_id', $hotelFacility->id)->get())){
            return false;
        }
        return true;
    }
}
