<?php

namespace App\Http\Controllers\Admin;

use App\HotelBonus;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\HotelBonusRequest;

class HotelBonusController extends AdminController
{
    /**
     * @var HotelBonus
     */
    protected $hotelBonus;

    /**
     * HotelBonusController constructor.
     * @param HotelBonus $hotelBonus
     */
    public function __construct(HotelBonus $hotelBonus)
    {
        $this->hotelBonus = $hotelBonus;
        parent::__construct();
        $this->title = 'Hotel Bonus';
        $this->breadcrumbs = [['route' => route('admin.hotel.bonus.index'), 'item' => 'Hotel Bonus']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('hotelBonuses', $this->hotelBonus->all()->load('languages'));
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
     * @param HotelBonusRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(HotelBonusRequest $request)
    {
        $this->hotelBonus->icon = $request->input('icon');

        DB::beginTransaction();
        if ($this->hotelBonus->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'hotel_bonus_id' => $this->hotelBonus->id
                ];
            }
            if ($this->hotelBonus->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.hotel.bonus.index')->with('status', 'Hotel bonus saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param HotelBonus $hotelBonus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(HotelBonus $hotelBonus)
    {
        return $this->view->with('hotelBonus', $hotelBonus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param HotelBonus $hotelBonus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(HotelBonus $hotelBonus)
    {
        return $this->view->with('hotelBonus', $hotelBonus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HotelBonusRequest $request
     * @param HotelBonus $hotelBonus
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(HotelBonusRequest $request, HotelBonus $hotelBonus)
    {
        $hotelBonus->icon = $request->input('icon');

        DB::beginTransaction();
        if ($hotelBonus->update()) {
            foreach (config('settings.locales') as $lang) {
                $hotelBonus->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.hotel.bonus.index')->with('status', 'Hotel bonus updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param HotelBonus $hotelBonus
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(HotelBonus $hotelBonus)
    {
        if($hotelBonus->delete()){
            return redirect()->route('admin.hotel.bonus.index')->with('status', 'Hotel bonus deleted successfully');
        }
        return back()->with('error', 'Error');
    }
}
