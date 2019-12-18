<?php

namespace App\Jobs;

use App\User;
use App\OrderCar;
use App\Mail\OrderCarCreate;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ProcessOrderCar implements ShouldQueue
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
     * @param OrderCar $order
     * @return void
     */
    public function __construct(OrderCar $order)
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
            ->send(new OrderCarCreate($this->order));

        foreach (User::admins() as $admin){
            Mail::to($admin->email)
                ->send(new OrderCarCreate($this->order));
        }
    }
}
