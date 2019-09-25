<?php

namespace App\Http\Controllers\Admin;

use App\HotelType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HotelTypeRequest;

class HotelTypeController extends AdminController
{
    /**
     * @var HotelType
     */
    protected $hotelType;

    /**
     * HotelTypeController constructor.
     * @param HotelType $hotelType
     */
    public function __construct(HotelType $hotelType)
    {
        $this->hotelType = $hotelType;
        parent::__construct();
        $this->title = 'Hotel Type';
        $this->breadcrumbs = [['route' => route('admin.hotel.type.index'), 'item' => 'Hotel Type']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('hotelTypes', $this->hotelType->all()->load('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HotelTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(HotelTypeRequest $request)
    {
        $this->hotelType->icon = $request->input('icon');
        $this->hotelType->sort = $request->input('sort');

        DB::beginTransaction();
        if ($this->hotelType->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'hotel_type_id' => $this->hotelType->id
                ];
            }
            if ($this->hotelType->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.hotel.type.index')->with('status', 'Hotel type saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param HotelType $hotelType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(HotelType $hotelType)
    {
        return $this->view->with('hotelType', $hotelType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HotelType $hotelType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(HotelType $hotelType)
    {
        return $this->view->with('hotelType', $hotelType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param HotelType $hotelType
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, HotelType $hotelType)
    {
        $hotelType->icon = $request->input('icon');
        $hotelType->sort = $request->input('sort');

        DB::beginTransaction();
        if ($hotelType->update()) {
            foreach (config('settings.locales') as $lang) {
                $hotelType->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.hotel.type.index')->with('status', 'Hotel type updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HotelType $hotelType
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(HotelType $hotelType)
    {
        if($hotelType->delete()){
            return redirect()->route('admin.hotel.type.index')->with('status', 'Hotel type deleted successfully');
        }
        return back()->with('error', 'Error');
    }
}
