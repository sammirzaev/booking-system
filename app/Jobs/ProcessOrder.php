<?php

namespace App\Jobs;

use App\Mail\Admin\OrderCreateNotification as AdminOrderCreateNotification;
use App\Mail\OrderCreate;
use App\Order;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 5;

    /**
     * @var Order
     */
    private $order;

    /**
     * ProcessOrder constructor.
     *
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->order->user->email)
            ->send(new OrderCreate($this->order));

        foreach (User::admins() as $admin){
            Mail::to($admin->email)
                ->send(new OrderCreate($this->order));
        }
    }
}
