<?php

namespace App\Http\Controllers;

use App\Order;
use App\Room;
use App\Hotel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\HotelCheckoutRequest;

class HotelCheckoutController extends FrontendController
{
    /**
     * @var Hotel
     */
    private $hotel;

    /**
     * @var Room
     */
    private $room;

    /**
     * HotelController constructor.
     *
     * @param Hotel $hotel
     * @param Room $room
     */
    public function __construct(Hotel $hotel, Room $room)
    {
        $this->hotel = $hotel;
        $this->room = $room;
    }

    /**
     * Display checkout page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if(request()->only('room_id')){
            return view('hotelcheckout.index')
                ->with('room', $this->room->whereId(request()->only('room_id'))->first()
                    ->load('language', 'image'));
        }
        redirect()->back();
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
     * @param Request $request
     */
    public function store(HotelCheckoutRequest $request)
    {
        if (!auth()->id()){
            $newPassword = rand(8,10);

            $user = new User();
            $user->name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->password = $newPassword;

            if ($user->save())
                $user->detail()->create([
                    'tel'       => $request->input('telephone'),
                    'country'   => $request->input('country'),
                    'region'    => $request->input('region'),
                    'city'      => $request->input('city'),
                    'address'   => $request->input('address'),
                    'zip'       => $request->input('zip'),
                    'user_id'   => $user->id
            ]);

            auth()->login($user);
        }

        $order = new Order();

//        $oder->
        redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        //
    }
}
