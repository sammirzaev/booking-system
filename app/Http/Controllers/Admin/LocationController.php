<?php

namespace App\Http\Controllers\Admin;

use App\Location;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\LocationRequest;

class LocationController extends AdminController
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
        parent::__construct();
        $this->title = 'Location';
        $this->breadcrumbs = [['route' => route('admin.location.index'), 'item' => 'Location']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('locations', $this->location->all()->load('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view->with('locations', $this->location->all()->load('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LocationRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(LocationRequest $request)
    {
        $this->location->code = $request->input('code');
        $this->location->parent_id = $request->input('parent');
        $this->location->latitude = $request->input('latitude');
        $this->location->longitude = $request->input('longitude');

        DB::beginTransaction();
        if ($this->location->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'location_id' => $this->location->id
                ];
            }
            if ($this->location->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.location.index')->with('status', 'Location saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Location $location)
    {
        return $this->view
            ->with('location', $location)
            ->with('locations', $this->location->all()->load('languages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Location $location
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Location $location)
    {
        return $this->view
            ->with('location', $location)
            ->with('locations', $this->location->all()->load('languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LocationRequest $request
     * @param Location $location
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(LocationRequest $request, Location $location)
    {
        $location->code = $request->input('code');
        $location->parent_id = $request->input('parent');
        $location->latitude = $request->input('latitude');
        $location->longitude = $request->input('longitude');

        DB::beginTransaction();
        if ($location->update()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $location->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.location.index')->with('status', 'Location updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Location $location
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Location $location)
    {
        if($this->useCheck($location) && $location->delete()){
            return redirect()->route('admin.location.index')->with('status', 'Location deleted successfully');
        }
        return back()->with('error', 'Error');
    }

    /**
     * Check location on used other Models
     *
     * @param Location $location
     * @return bool
     */
    protected function useCheck($location){
        return true;
    }
}
