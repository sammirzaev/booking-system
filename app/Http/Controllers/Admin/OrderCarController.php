<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use App\OrderCar;
use Illuminate\Http\Request;
use App\Events\OrderCarChangeEvent;

class OrderCarController extends AdminController
{
    const STATUS_CAR_AVIABILITY_FREE = null;
    const STATUS_CAR_AVIABILITY_BOOKED = 2;

    /**
     * @var OrderCar
     */
    protected $order;

    /**
     * @var Car
     */
    private $car;

    /**
     * OrderCarController constructor.
     * @param OrderCar $order
     */
    public function __construct(OrderCar $order, Car $car)
    {
        $this->order = $order;
        $this->car = $car;

        parent::__construct();
        $this->title = 'Order';
        $this->breadcrumbs = [['route' => route('admin.order.car.index'), 'item' => 'Order']];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->order::orderByDesc('id')->paginate($this->getPaginate());

        return $this->view->with('orders', $orders);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->view->with('order', $this->order::whereId($id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = $this->order::whereId($id)->first();

        if($order->status !== $request->status){
            if($order->update(['status' => $request->status]))
            {
                $car = $this->car::whereId($order->car_id)->first();

                $carAvailableStatus = self::STATUS_CAR_AVIABILITY_FREE;
                if($request->status == 1 || $request->status == 2)
                {
                    $carAvailableStatus = self::STATUS_CAR_AVIABILITY_BOOKED;
                }
                if($car){
                    for($i = strtotime($order->date_start); $i <= strtotime($order->date_end ); $i = $i + 3600)
                    {
                        $car->availabilities()->where('date', $i)->update([
                                'status'  => $carAvailableStatus,
                            ]
                        );
                    }
                }
            }
            try{
                event(new OrderCarChangeEvent($order));
            }
            catch (\Exception $e){
                return redirect()->route('admin.order.car.index')
                    ->with('status', 'Car order changed successfully');
            }

            return redirect()->route('admin.order.car.index')
                ->with('status', 'Car order changed successfully');
        }
        return redirect()->back()->with('error', 'Car order changed error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
