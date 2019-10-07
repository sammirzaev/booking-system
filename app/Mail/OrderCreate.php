<?php

namespace App\Mail;

use App\Room;
use App\Hotel;
use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderCreate extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Order
     */
    public $order;

    /**
     * Create a new message instance.
     *
     * @param Order $order
     * @return void
     */
    public function __construct(Order $order)
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
        $room = new Room();
        $hotel = new Hotel();

        $data = [
            'order'     => $this->order,
            'rooms'     => $room->all()->load('type'),
            'hotels'    => $hotel->all()->load('language'),
        ];
        $this->subject = 'Create Order #' . $this->order->id;

        return $this->view('mail.order.create', $data);

        //return $this->view('view.name');
    }
}
