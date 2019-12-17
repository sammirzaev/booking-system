<?php

namespace App\Http\Controllers;

use App\OrderCar;

class OrderCarController extends FrontendController
{
    /**
     * @var OrderCar
     */
    private $order;

    /**
     * OrderCarController constructor.
     * @param OrderCar $order
     */
    public function __construct(OrderCar $order)
    {
        $this->order = $order;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->order::where('user_id', auth()->id())->orderByDesc('id')
            ->paginate(config('paginate.user.orders'));

        return view('order-car.index')
            ->with('orders', $orders);
    }
}
