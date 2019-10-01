<?php

namespace App\Http\Controllers\Admin;

use App\RoomFacility;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RoomFacilityRequest;

class RoomFacilityController extends AdminController
{
    /**
     * @var RoomFacility
     */
    protected $roomFacility;

    /**
     * RoomFacilityController constructor.
     * @param RoomFacility $roomFacility
     */
    public function __construct(RoomFacility $roomFacility)
    {
        $this->roomFacility = $roomFacility;
        parent::__construct();
        $this->title = 'Room Facility';
        $this->breadcrumbs = [['route' => route('admin.room.facility.index'), 'item' => 'Room Facility']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('roomFacilities', $this->roomFacility->all()->load('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view->with('roomFacilities', $this->roomFacility->all()->load('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoomFacilityRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(RoomFacilityRequest $request)
    {
        $this->roomFacility->icon = $request->input('icon');
        $this->roomFacility->parent_id = $request->input('parent');
        $this->roomFacility->sort = $request->input('sort');

        DB::beginTransaction();
        if ($this->roomFacility->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'room_facility_id' => $this->roomFacility->id
                ];
            }
            if ($this->roomFacility->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.room.facility.index')->with('status', 'Room facility saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param RoomFacility $roomFacility
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(RoomFacility $roomFacility)
    {
        return $this->view->with('roomFacility', $roomFacility);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomFacility $roomFacility
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(RoomFacility $roomFacility)
    {
        return $this->view->with('roomFacility', $roomFacility)
            ->with('roomFacilities', $this->roomFacility->all()->load('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoomFacilityRequest $request
     * @param RoomFacility $roomFacility
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(RoomFacilityRequest $request, RoomFacility $roomFacility)
    {
        $roomFacility->icon = $request->input('icon');
        $roomFacility->parent_id = $request->input('parent');
        $roomFacility->sort = $request->input('sort');

        DB::beginTransaction();
        if ($roomFacility->update()) {
            foreach (config('settings.locales') as $lang) {
                $roomFacility->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.room.facility.index')->with('status', 'Room facility updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoomFacility $roomFacility
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(RoomFacility $roomFacility)
    {
        if($this->useCheck($roomFacility) && $roomFacility->delete()){
            return redirect()->route('admin.room.facility.index')->with('status', 'Room facility deleted successfully');
        }
        return back()->with('error', 'Error');
    }

    /**
     * Check location on used other Models
     *
     * @param RoomFacility $roomFacility
     * @return bool
     */
    protected function useCheck($roomFacility)
    {
        if(current($this->roomFacility->where('parent_id', $roomFacility->id)->get())){
            return false;
        }
        return true;
    }
}
