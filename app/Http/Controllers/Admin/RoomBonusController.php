<?php

namespace App\Http\Controllers\Admin;

use App\RoomBonus;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RoomBonusRequest;

class RoomBonusController extends AdminController
{
    /**
     * @var RoomBonus
     */
    protected $roomBonus;

    /**
     * RoomBonusController constructor.
     * @param RoomBonus $roomBonus
     */
    public function __construct(RoomBonus $roomBonus)
    {
        $this->roomBonus = $roomBonus;
        parent::__construct();
        $this->title = 'Room Bonus';
        $this->breadcrumbs = [['route' => route('admin.room.bonus.index'), 'item' => 'Room Bonus']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('roomBonuses', $this->roomBonus->all()->load('languages'));
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
     * @param RoomBonusRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(RoomBonusRequest $request)
    {
        $this->roomBonus->icon = $request->input('icon');

        DB::beginTransaction();
        if ($this->roomBonus->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'room_bonus_id' => $this->roomBonus->id
                ];
            }
            if ($this->roomBonus->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.room.bonus.index')->with('status', 'Room bonus saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param RoomBonus $roomBonus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(RoomBonus $roomBonus)
    {
        return $this->view->with('roomBonus', $roomBonus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomBonus $roomBonus
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(RoomBonus $roomBonus)
    {
        return $this->view->with('roomBonus', $roomBonus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoomBonusRequest $request
     * @param RoomBonus $roomBonus
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(RoomBonusRequest $request, RoomBonus $roomBonus)
    {
        $roomBonus->icon = $request->input('icon');

        DB::beginTransaction();
        if ($roomBonus->update()) {
            foreach (config('settings.locales') as $lang) {
                $roomBonus->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.room.bonus.index')->with('status', 'Room bonus updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoomBonus $roomBonus
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(RoomBonus $roomBonus)
    {
        if($roomBonus->delete()){
            return redirect()->route('admin.room.bonus.index')->with('status', 'Room bonus deleted successfully');
        }
        return back()->with('error', 'Error');
    }
}
