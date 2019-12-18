<?php

namespace App\Listeners;

use App\Jobs\ProcessOrderCarChange;
use App\Events\OrderCarChangeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendOrderCarChangeNotificationListener
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
     * @param  OrderCarChangeEvent  $event
     * @return void
     */
    public function handle(OrderCarChangeEvent $event)
    {
        ProcessOrderCarChange::dispatch($event->order);
    }
}
