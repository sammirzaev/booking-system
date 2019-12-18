<?php

namespace App\Providers;

use App\Events\OrderChangeEvent;
use App\Events\OrderCreateEvent;
use App\Events\OrderCarCreateEvent;
use App\Events\OrderCarChangeEvent;
use Illuminate\Auth\Events\Registered;
use App\Listeners\SendOrderCreateNotificationListener;
use App\Listeners\SendOrderChangeNotificationListener;
use App\Listeners\SendOrderCarChangeNotificationListener;
use App\Listeners\SendOrderCarCreateNotificationListener;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderCreateEvent::class => [
            SendOrderCreateNotificationListener::class,
        ],
        OrderChangeEvent::class => [
            SendOrderChangeNotificationListener::class,
        ],
        OrderCarCreateEvent::class => [
            SendOrderCarCreateNotificationListener::class,
        ],
        OrderCarChangeEvent::class => [
            SendOrderCarChangeNotificationListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
