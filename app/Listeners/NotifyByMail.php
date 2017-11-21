<?php

namespace App\Listeners;

use App\Events\InvoiceCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\User;

use App\Mail\PurchasingReport;
use App\Notifications\InvoicePaid;


class NotifyByMail
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
     * @param  InvoiceCreated  $event
     * @return void
     */
    public function handle(InvoiceCreated $event)
    {

        // \Mail::to(auth()->user())->send(new PurchasingReport($event->invoice, $event->products));

        $user = auth()->user();

        $user->notify(new InvoicePaid($event->invoice, $event->products));

        session()->forget('products');

        session()->forget('invoice');

    }
}
