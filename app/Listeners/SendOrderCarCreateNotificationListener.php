<?php

namespace App\Listeners;

use App\Jobs\ProcessOrderCar;
use App\Events\OrderCarCreateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderCarCreateNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderCarCreateEvent  $event
     * @return void
     */
    public function handle(OrderCarCreateEvent $event)
    {
        ProcessOrderCar::dispatch($event->order);
    }
}
