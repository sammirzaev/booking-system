<?php

namespace App\Mail;

use App\OrderCar;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCarChange extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @param OrderCar $order
     * @return void
     */
    public function __construct(OrderCar $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'order' => $this->order
        ];
        $this->subject = 'Change Car Order #' . $this->order->id;

        return $this->view('mail.ordercar.change', $data);
    }
}
