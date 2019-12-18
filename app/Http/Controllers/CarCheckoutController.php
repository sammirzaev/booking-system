<?php

namespace App\Http\Controllers;

use App\Car;
use App\OrderCar;
use App\Http\Traits\User;
use Illuminate\Http\Request;
use App\Http\Traits\CarCheck;
use App\Events\OrderCarCreateEvent;
use App\Events\OrderCarChangeEvent;

class CarCheckoutController extends FrontendController
{
    const STATUS_ORDER_CAR_PENDING = 1;
    const STATUS_ORDER_CAR_CANCEL = 3;
    const STATUS_CAR_AVIABILITY_FREE = null;
    const STATUS_CAR_AVIABILITY_BOOKED = 2;

    use CarCheck, User;

    public function __construct()
    {
        $this->middleware('auth')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($this->checkAviabilty(\request())){
            return view('carcheckout.index')
                ->with('car', Car::whereId((int)request()->car)->first());
        }
        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->createUser($request);
        $car = $this->oneCar($request->car);

        if($user && $car)
        {
            $order = new OrderCar();
            $order->price           = $car->price;
            $order->paid            = null;
            $order->payment_type    = null;
            $order->date_start      = $request->start_date . ' ' .$request->start_time;
            $order->date_end        = $request->end_date . ' ' .$request->end_time;
            $order->status          = self::STATUS_ORDER_CAR_PENDING;
            $order->adults          = $request->adults;
            $order->car_id          = $car->id;
            $order->user_id         = $user->id;

            if($order->save())
            {
                for($i = strtotime($request->start_date . ' ' .$request->start_time);
                    $i <= strtotime($request->end_date . ' ' .$request->end_time); $i = $i + 3600){
                    $car->availabilities()->where('date', $i)->update([
                            'status'  => self::STATUS_CAR_AVIABILITY_BOOKED,
                        ]
                    );
                }
                try{
                    event(new OrderCarCreateEvent($order));
                }
                catch (\Exception $e){
                    return redirect()->route('user.order.car.index')
                        ->with('status', 'Car order created successfully');
                }
                return redirect()->route('user.order.car.index')
                    ->with('status', 'Car order created successfully');
            }
        }
        return redirect()->back()->with('error', 'Car order does not created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = OrderCar::whereId($id)->first();
        $order->status = self::STATUS_ORDER_CAR_CANCEL;
        $car = $this->oneCar($order->car_id);

        if($car && $order->save())
        {
            for($i = strtotime($order->date_start); $i <= strtotime($order->date_end ); $i = $i + 3600){
                $car->availabilities()->where('date', $i)->update([
                        'status'  => self::STATUS_CAR_AVIABILITY_FREE,
                    ]
                );
            }
            try{
                event(new OrderCarChangeEvent($order));
            }
            catch (\Exception $e){
                return redirect()->route('user.order.car.index')
                    ->with('status', 'Car order canceled successfully');
            }
            return redirect()->route('user.order.car.index')
                ->with('status', 'Car order canceled successfully');
        }
        return redirect()->back()->with('error', 'Car order does not canceled successfully');
    }

    /**
     * @param int $id
     * @return Car|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    private function oneCar(int $id)
    {
        return Car::whereId($id)->first();
    }
}
