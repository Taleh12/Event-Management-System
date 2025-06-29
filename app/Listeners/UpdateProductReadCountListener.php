<?php

namespace App\Listeners;

use App\Events\ProductViewed;
use App\Jobs\UpdateProductReadCountJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateProductReadCountListener implements ShouldQueue
{

    public $tries = 3; // Maksimum cəhd
    public $timeout = 10; // saniyə
    public $backoff = 5; // Yenidən cəhd etmə müddəti (saniyə)
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
    public function handle(ProductViewed $event): void
    {
        dispatch(new UpdateProductReadCountJob($event->product->id));
    }

    public function failed(ProductViewed $event, $exception): void
    {
        Log::error("Failed to update read count for Product ID: {$event->product->id}. Error: {$exception->getMessage()}");
    }
}
