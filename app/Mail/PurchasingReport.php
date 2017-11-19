<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Repositories\Baskets;

class PurchasingReport extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;

    public $products;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($invoice, $products)
    {
        
        $this->invoice = $invoice;

        $this->products = $products;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.purchase-report');
    }
}
