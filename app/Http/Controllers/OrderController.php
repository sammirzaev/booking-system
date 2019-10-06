<?php

namespace App\Http\Controllers;

use App\Hotel;
use App\Order;
use App\Room;
use Illuminate\Http\Request;

class OrderController extends FrontendController
{
    const STATUS_ROOM_FREE = null;
    const STATUS_ORDER_ROOM_CANCEL = 3;

    /**
     * @var Order
     */
    private $order;

    /**
     * @var Room
     */
    private $room;
    /**
     * @var Hotel
     */
    private $hotel;

    /**
     * OrderController constructor.
     * @param Order $order
     * @param Room $room
     * @param Hotel $hotel
     */
    public function __construct(Order $order, Room $room, Hotel $hotel)
    {
        $this->order = $order;
        $this->room = $room;
        $this->hotel = $hotel;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('order.index')
            ->with('orders', $this->order::orderByDesc('id')->get())
            ->with('rooms', $this->room->all()->load('type'))
            ->with('hotels', $this->hotel->all()->load('language'));
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        if($order->user_id === auth()->id()){

            if($order->update(['status' => self::STATUS_ORDER_ROOM_CANCEL])){

                $this->room = $this->room::whereId($order->type)->first();

                if($this->room){
                    for($i = $order->date_start;
                        $i <= $order->date_end;
                        $i = date('Y-m-d', strtotime($i. ' + 1 day'))
                    ){
                        $this->room->availabilities()->where('current_date', strtotime($i))->update([
                                'status'  => self::STATUS_ROOM_FREE,
                            ]
                        );
                    }
                }
            }

            return redirect()->route('user.order.index')->with('status', 'Order canceled successfully');
        }
        return redirect()->route('user.order.index')->with('error', 'Order canceled error');
    }
}
