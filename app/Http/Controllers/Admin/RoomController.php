<?php

namespace App\Http\Controllers\Admin;

use App\Hotel;
use App\Room;
use App\RoomAvailability;
use App\RoomDetail;
use App\RoomType;
use App\RoomBonus;
use App\RoomFacility;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RoomRequest;

class RoomController extends AdminController
{
    /**
     * @var Room
     */
    protected $room;

    /**
     * @var RoomType
     */
    private $roomType;

    /**
     * @var RoomFacility
     */
    private $roomFacility;

    /**
     * @var RoomBonus
     */
    private $roomBonus;

    /**
     * @var RoomDetail
     */
    private $roomDetail;

    /**
     * @var RoomAvailability
     */
    private $roomAvailability;

    /**
     * @var Hotel
     */
    private $hotel;

    /**
     * RoomController constructor.
     * @param Room $room
     * @param RoomType $roomType
     * @param RoomFacility $roomFacility
     * @param RoomBonus $roomBonus
     * @param RoomDetail $roomDetail
     * @param RoomAvailability $roomAvailability
     * @param Hotel $hotel
     */
    public function __construct(Room $room, RoomType $roomType, RoomFacility $roomFacility, RoomBonus $roomBonus, RoomDetail $roomDetail, RoomAvailability $roomAvailability, Hotel $hotel)
    {
        $this->room = $room;
        $this->roomType = $roomType;
        $this->roomBonus = $roomBonus;
        $this->roomFacility = $roomFacility;
        $this->roomDetail = $roomDetail;
        $this->roomAvailability = $roomAvailability;
        $this->hotel = $hotel;

        parent::__construct();
        $this->title = 'Room';
        $this->breadcrumbs = [['route' => route('admin.room.index'), 'item' => 'Room']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->view
            ->with('hotels', $this->hotel->all()->load('language'))
            ->with('roomTypes', $this->roomType->all()->load('language'))
            ->with('rooms', $this->room->all()->load('language', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return $this->view
            ->with('hotels', $this->hotel->all()->load('language'))
            ->with('roomTypes', $this->roomType->all()->load('language'))
            ->with('roomBonuses', $this->roomBonus->all()->load('language'))
            ->with('roomFacilities', $this->roomFacility->all()->load('language'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoomRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(RoomRequest $request)
    {
        $this->room->price                  = $request->input('mainPrice');
        $this->room->booking_option         = $request->input('mainBookingOption');
        $this->room->payment_type           = $request->input('mainPaymentType');
        $this->room->booking_value          = $request->input('mainBookingValue');
        $this->room->cancel_booking_value   = $request->input('mainCancelBookingValue');
        $this->room->discount_value         = $request->input('mainDiscountValue');
        $this->room->sort                   = $request->input('mainSort');
        $this->room->notes                  = $request->input('mainNotes');
        $this->room->hotel_id               = $request->input('hotel');

        DB::beginTransaction();
        if ($this->room->save()) {
            $languages = [];
            foreach (config('settings.locales') as $lang) {
                $languages[] = [
                    'lang' => $lang,
                    'description' => $request->input("mainDescription.$lang"),
                    'room_id' => $this->room->id
                ];
            }
            if ($this->room->languages()->createMany($languages)){

                if ($request->hasFile("mediaUploaded")){
                    $mediaUploaded = [];
                    foreach ($request->file("mediaUploaded") as $media){
                        $upload = $media->store('rooms', 'public');

                        if($upload){
                            $mediaUploaded[] = [
                                'name' => str_replace('rooms/', '', $upload),
                                'type' => $media->getMimeType(),
                                'room_id' => $this->room->id
                            ];
                        }
                        if($media->isFile()){
                            unlink($media->getRealPath());
                        }
                    }
                    $this->room->images()->createMany($mediaUploaded);
                }
                if ($request->input("roomType")){
                    $this->room->type()->sync($request->input("roomType"));
                }
                if ($request->input("roomFacilities")){
                    $roomFacilities = [];
                    foreach ($request->input("roomFacilities") as $key => $item){
                        array_push($roomFacilities, $key);
                    }
                    $this->room->facilities()->sync($roomFacilities);
                }
                if ($request->input("roomBonuses")){
                    $roomBonuses = [];
                    foreach ($request->input("roomBonuses") as $key => $item){
                        array_push($roomBonuses, $key);
                    }
                    $this->room->bonuses()->sync($roomBonuses);
                }
                if ($request->input("detailAdults")){
                    $roomDetails = [
                        'adults'    => $request->input("detailAdults"),
                        'children'  => $request->input("detailChildren"),
                        'beds'      => $request->input("detailBeds"),
                        'footage'   => $request->input("detailFootage"),
                        'room_id'   => $this->room->id
                    ];
                    $this->room->detail()->create($roomDetails);
                }

                if($request->input("detailCurrentDateStart") && $request->input("detailCurrentDateEnd") && $request->input("hotel")){
                    $roomAvailabilities = [];
                    for($i = $request->input("detailCurrentDateStart");
                        $i <= $request->input("detailCurrentDateEnd");
                        $i = date('Y-m-d', strtotime($i. ' + 1 day'))
                        ){
                        $roomAvailabilities[] = [
                            'current_date' => strtotime($i),
                            'room_id' => $this->room->id,
                            'hotel_id' => $request->input("hotel"),
                        ];
                    }
                    $this->room->availabilities()->createMany($roomAvailabilities);
                }
                DB::commit();
                return redirect()->route('admin.room.index')->with(['success' => 'Room saved successfully']);
            }
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Display the specified resource.
     *
     * @param Room $room
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Room $room
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Room $room)
    {
        return $this->view
            ->with('room', $room->load( 'languages', 'type'))
            ->with('hotels', $this->hotel->all()->load('language', 'availabilities'))
            ->with('roomTypes', $this->roomType->all()->load('language'))
            ->with('roomBonuses', $this->roomBonus->all()->load('language'))
            ->with('roomFacilities', $this->roomFacility->all()->load('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoomRequest $request
     * @param Room $room
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(RoomRequest $request, Room $room)
    {
        $room->price                  = $request->input('mainPrice');
        $room->booking_option         = $request->input('mainBookingOption');
        $room->payment_type           = $request->input('mainPaymentType');
        $room->booking_value          = $request->input('mainBookingValue');
        $room->cancel_booking_value   = $request->input('mainCancelBookingValue');
        $room->discount_value         = $request->input('mainDiscountValue');
        $room->sort                   = $request->input('mainSort');
        $room->notes                  = $request->input('mainNotes');
        $room->hotel_id               = $request->input('hotel');

        DB::beginTransaction();
        if ($room->update()) {
            foreach (config('settings.locales') as $lang) {
                $room->language()->where('lang', $lang)
                    ->update([
                        'description' => $request->input("mainDescription.$lang")
                    ]);
            }
            if ($request->hasFile("mediaUploaded")){
                $mediaUploaded = [];
                foreach ($request->file("mediaUploaded") as $media){
                    $upload = $media->store('rooms', 'public');

                    if($upload){
                        $mediaUploaded[] = [
                            'name' => str_replace('rooms/', '', $upload),
                            'type' => $media->getMimeType(),
                            'room_id' => $room->id
                        ];
                    }
                    if($media->isFile()){
                        unlink($media->getRealPath());
                    }
                }
                $room->images()->createMany($mediaUploaded);
            }
            if ($request->input("roomType")){
                $room->type()->sync($request->input("roomType"));
            }
            if ($request->input("roomFacilities")){
                $roomFacilities = [];
                foreach ($request->input("roomFacilities") as $key => $item){
                    array_push($roomFacilities, $key);
                }
                $room->facilities()->sync($roomFacilities);
            }
            if ($request->input("roomBonuses")){
                $roomBonuses = [];
                foreach ($request->input("roomBonuses") as $key => $item){
                    array_push($roomBonuses, $key);
                }
                $room->bonuses()->sync($roomBonuses);
            }
            if ($request->input("detailAdults")){
                $room->detail()->where('room_id', $room->id)
                    ->update([
                        'adults'    => $request->input("detailAdults"),
                        'children'  => $request->input("detailChildren"),
                        'beds'      => $request->input("detailBeds"),
                        'footage'   => $request->input("detailFootage"),
                    ]);
            }
            if($request->input("detailCurrentDateStart") && $request->input("detailCurrentDateEnd") && $request->input("hotel")){
                for($i = $request->input("detailCurrentDateStart");
                    $i <= $request->input("detailCurrentDateEnd");
                    $i = date('Y-m-d', strtotime($i. ' + 1 day'))
                ){
                    $room->availabilities()->where('current_date', strtotime($i))->updateOrInsert([
                            'current_date'  => strtotime($i),
                            'room_id'       => $room->id,
                            'hotel_id'      => $request->input("hotel"),
                        ]
                    );
                }
            }
            DB::commit();
            return redirect()->route('admin.room.index')->with(['success' => 'Room updated successfully']);
        }
        DB::rollBack();
        return back()->with('error', 'Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Room $room
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Room $room)
    {
        if($this->useCheck($room) && $room->delete()){
            return redirect()->route('admin.room.index')->with('success', 'Room deleted successfully');
        }
        return back()->with('error', 'Error');
    }

    /**
     * Check location on used other Models
     *
     * @param Room $room
     * @return bool
     */
    protected function useCheck($room)
    {
        return true;
    }
}
