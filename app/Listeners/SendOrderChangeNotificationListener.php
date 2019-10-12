<?php

namespace App\Listeners;

use App\Jobs\ProcessOrderChange;
use App\Events\OrderChangeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderChangeNotificationListener
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
     * @param  OrderChangeEvent  $event
     * @return void
     */
    public function handle(OrderChangeEvent $event)
    {
        ProcessOrderChange::dispatch($event->order);
    }
}
