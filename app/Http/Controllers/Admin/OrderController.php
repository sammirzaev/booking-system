<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderChangeEvent;
use App\Hotel;
use App\Order;
use App\Room;
use Illuminate\Http\Request;

class OrderController extends AdminController
{
    const STATUS_ROOM_FREE = null;
    const STATUS_ROOM_BOOKED = 2;
    /**
     * @var Order
     */
    protected $order;

    /**
     * @var Hotel
     */
    private $hotel;

    /**
     * @var Room
     */
    private $room;

    /**
     * OrderController constructor.
     * @param Order $order
     * @param Hotel $hotel
     * @param Room $room
     */
    public function __construct(Order $order, Hotel $hotel, Room $room)
    {
        $this->order = $order;
        $this->hotel = $hotel;
        $this->room = $room;

        parent::__construct();
        $this->title = 'Order';
        $this->breadcrumbs = [['route' => route('admin.order.index'), 'item' => 'Order']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = $this->order::orderByDesc('id')->paginate($this->getPaginate());

        return $this->view
            ->with('orders', $orders)
            ->with('rooms', $this->room->all()->load('type'))
            ->with('hotels', $this->hotel->all()->load('language'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Order $order)
    {
        return $this->view
            ->with('order', $order)
            ->with('rooms', $this->room->all()->load('type'))
            ->with('hotels', $this->hotel->all()->load('language'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, Order $order)
    {
        if($order->status !== $request->input('status')){
            if($order->update(['status' => $request->input('status')])){

                $this->room = $this->room::whereId($order->type)->first();

                $roomAvailableStatus = self::STATUS_ROOM_BOOKED;
                if($request->input('status') > 3){
                    $roomAvailableStatus = self::STATUS_ROOM_FREE;
                }

                if($this->room){
                    for($i = $order->date_start;
                        $i <= $order->date_end;
                        $i = date('Y-m-d', strtotime($i. ' + 1 day'))
                    ){
                        $this->room->availabilities()->where('current_date', strtotime($i))->update([
                                'status'  => $roomAvailableStatus,
                            ]
                        );
                    }
                }
            }
//            event(new OrderChangeEvent($order));

            return redirect()->route('admin.order.index')->with('status', 'Order changed successfully');
        }
        return redirect()->back()->with('error', 'Order changed error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        //
    }
}
