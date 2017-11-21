<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Invoice;

class InvoiceCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $products;

    public $invoice;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($products, $invoice)
    {

        $this->products = $products;

        $this->invoice = $invoice;
        
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
