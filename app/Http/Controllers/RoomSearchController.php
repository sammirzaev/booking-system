<?php

namespace App\Http\Controllers;

use App\Room;
use App\Location;
use Carbon\Carbon;
use App\RoomAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomSearchController extends FrontendController
{
    /**
     * @var Room
     */
    private $room;

    /**
     * @var Location
     */
    protected $location;
    /**
     * @var RoomAvailability
     */
    private $roomAvailability;

    /**
     * RoomSearchController constructor.
     * @param Room $room
     * @param RoomAvailability $roomAvailability
     * @param Location $location
     */
    public function __construct(Room $room, RoomAvailability $roomAvailability, Location $location)
    {
        $this->room = $room;
        $this->location = $location;
        $this->roomAvailability = $roomAvailability;
    }

    /**
     * Room availability check.
     *
     * @param  Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->isMethod('GET')
            && $request->input('room_id')
            && $request->input('adult')
            && $request->input('date_in')
            && $request->input('date_out')){

            $validator = Validator::make($request->only('date_in', 'date_out'), [
                'date_in'    => 'required|after:'. Carbon::today()->toDateString(),
                'date_out'   => 'required|after:date_in|before:'. Carbon::tomorrow()->addDays(config('booking.room.user.max_booking_range_day'))->toDateString(),
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => 'Not available with these search options']);
            }

            $roomDetail = $this->room::with('detail')
                ->where('id', $request->input('room_id'))
                ->whereHas('detail', function($query) use ($request){
                    $query->where('adults', '>=', $request->input('adult'));
            })
                ->whereHas('detail', function($query) use ($request){
                    if($request->input('children')){
                        $query->where('children', '>=', $request->input('children'));
                    }
                })->get();
            if($roomDetail->first()){
                $roomAvailability = $this->roomAvailability::where('room_id', $request->input('room_id'))
                    ->whereNull('status')
                    ->whereBetween('current_date', [
                        strtotime($request->input('date_in')),
                        strtotime($request->input('date_out'))
                        ])
                    ->count();

                $start_date = strtotime($request->input('date_in'));
                $finish_date = strtotime($request->input('date_out'));

                $elapsed_days = ($finish_date - $start_date) / 86400;

                if($roomAvailability >= $elapsed_days){
                    return response()->json(['status' => true]);
                }
            }
        }
        return response()->json(['error' => 'Not available with these search options']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}
