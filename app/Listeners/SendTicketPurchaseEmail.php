<?php

namespace App\Listeners;

use App\Events\TicketPurchased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendTicketPurchaseEmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketPurchased $event): void
    {
        $ticket = $event->ticket;

        // Burada əslində mail göndərə bilərsən
        Log::info("🎫 Ticket alındı: {$ticket->type} - Price: {$ticket->price}");
    }
}
