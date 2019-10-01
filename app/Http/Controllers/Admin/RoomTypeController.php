<?php

namespace App\Http\Controllers\Admin;

use App\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RoomTypeRequest;

class RoomTypeController extends AdminController
{
    /**
     * @var RoomType
     */
    protected $roomType;

    /**
     * RoomTypeController constructor.
     * @param RoomType $roomType
     */
    public function __construct(RoomType $roomType)
    {
        $this->roomType = $roomType;
        parent::__construct();
        $this->title = 'Room Type';
        $this->breadcrumbs = [['route' => route('admin.room.type.index'), 'item' => 'Room Type']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view->with('roomTypes', $this->roomType->all()->load('languages'));
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
     * @param RoomTypeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(RoomTypeRequest $request)
    {
        $this->roomType->icon = $request->input('icon');
        $this->roomType->sort = $request->input('sort');

        DB::beginTransaction();
        if ($this->roomType->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'title' => $request->input("title.$lang"),
                    'room_type_id' => $this->roomType->id
                ];
            }
            if ($this->roomType->languages()->createMany($languages)){
                DB::commit();
                return redirect()->route('admin.room.type.index')->with('status', 'Room type saved successfully');
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param RoomType $roomType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(RoomType $roomType)
    {
        return $this->view->with('roomType', $roomType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param RoomType $roomType
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(RoomType $roomType)
    {
        return $this->view->with('roomType', $roomType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param RoomType $roomType
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, RoomType $roomType)
    {
        $roomType->icon = $request->input('icon');
        $roomType->sort = $request->input('sort');

        DB::beginTransaction();
        if ($roomType->update()) {
            foreach (config('settings.locales') as $lang) {
                $roomType->languages()->where('lang', $lang)
                    ->update([
                        'title' => $request->input("title.$lang")
                    ]);
            }
            DB::commit();
            return redirect()->route('admin.room.type.index')->with('status', 'Room type updated successfully');
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param RoomType $roomType
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(RoomType $roomType)
    {
        if($roomType->delete()){
            return redirect()->route('admin.room.type.index')->with('status', 'Room type deleted successfully');
        }
        return back()->with('error', 'Error');
    }
}
