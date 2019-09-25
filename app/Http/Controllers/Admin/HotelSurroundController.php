<?php

namespace App\Http\Controllers\Admin;

use App\HotelSurround;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HotelSurroundRequest;

class HotelSurroundController extends AdminController
{
    /**
     * @var HotelSurround
     */
    protected $hotelSurround;

    /**
     * HotelSurroundController constructor.
     * @param HotelSurround $hotelSurround
     */
    public function __construct(HotelSurround $hotelSurround)
    {
        $this->hotelSurround = $hotelSurround;
        parent::__construct();
        $this->title = 'Hotel Surround';
        $this->breadcrumbs = [['route' => route('admin.hotel.surround.index'), 'item' => 'Hotel Surround']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('hotelSurrounds', $this->hotelSurround->all()->load('languages'));
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
     * @param HotelSurroundRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(HotelSurroundRequest $request)
    {
        $this->hotelSurround->icon = $request->input('icon');
        $this->hotelSurround->sort = $request->input('sort');

        DB::beginTransaction();
        if ($this->hotelSurround->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'hotel_surround_id' => $this->hotelSurround->id
                ];
            }
            if ($this->hotelSurround->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.hotel.surround.index')->with('status', 'Hotel surround saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param HotelSurround $hotelSurround
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(HotelSurround $hotelSurround)
    {
        return $this->view->with('hotelSurround', $hotelSurround);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HotelSurround $hotelSurround
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(HotelSurround $hotelSurround)
    {
        return $this->view->with('hotelSurround', $hotelSurround);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HotelSurroundRequest $request
     * @param HotelSurround $hotelSurround
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(HotelSurroundRequest $request, HotelSurround $hotelSurround)
    {
        $hotelSurround->icon = $request->input('icon');
        $hotelSurround->sort = $request->input('sort');

        DB::beginTransaction();
        if ($hotelSurround->update()) {
            foreach (config('settings.locales') as $lang) {
                $hotelSurround->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.hotel.surround.index')->with('status', 'Hotel surround updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HotelSurround $hotelSurround
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(HotelSurround $hotelSurround)
    {
        if($hotelSurround->delete()){
            return redirect()->route('admin.hotel.surround.index')->with('status', 'Hotel surround deleted successfully');
        }
        return back()->with('error', 'Error');
    }
}
