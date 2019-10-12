<?php

namespace App\Http\Controllers;

use App\Events\OrderCreateEvent;
use App\Order;
use App\Room;
use App\Hotel;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\HotelCheckoutRequest;

class HotelCheckoutController extends FrontendController
{
    const OBJECT_TYPE = 1;
    const STATUS_ROOM_BOOKED = 2;
    const STATUS_ORDER_ROOM_PENDING = 1;

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
        return redirect()->back();
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
     * @param HotelCheckoutRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(HotelCheckoutRequest $request)
    {
        if (!auth()->id()){
            $newPassword = bcrypt(\Str::random(10));

            $user = new User();
            $user->name         = $request->input('first_name');
            $user->last_name    = $request->input('last_name');
            $user->email        = $request->input('email');
            $user->password     = $newPassword;

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

        $this->room = $this->room::whereId($request->input('room_id'))->first();

        $order = new Order();
        $order->order_type      = self::OBJECT_TYPE;
        $order->object          = $this->room->hotel_id;
        $order->type            = $this->room->id;
        $order->price           = $this->room->price;
//        add request paid
        $order->paid            = null;
        $order->payment_type    = $this->room->payment_type;
        $order->date_start      = date('Y-m-d', strtotime($request->input('date_in')));
        $order->date_end        = date('Y-m-d', strtotime($request->input('date_out')));
        $order->status          = self::STATUS_ORDER_ROOM_PENDING;
        $order->adults          = $request->input('adult');
        $order->children        = $request->input('children');
        $order->user_id         = auth()->id();

        if($order->save()){
            for($i = $request->input("date_in");
                $i <= $request->input("date_out");
                $i = date('Y-m-d', strtotime($i. ' + 1 day'))
            ){
                $this->room->availabilities()->where('current_date', strtotime($i))->update([
                        'status'  => self::STATUS_ROOM_BOOKED,
                    ]
                );
            }
            event(new OrderCreateEvent($order));
            return redirect()->route('user.order.index')->with('status', 'Order created successfully');
        }
        return redirect()->back()->with('error', 'Order does not created successfully');
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
