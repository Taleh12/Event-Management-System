<?php

namespace App\Listeners;

use App\Events\CampaignStarted;
use App\Jobs\SendBulkEmailJob;
use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCampaignToSubscribers
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
    public function handle(CampaignStarted $event)
    {
        Subscription::chunk(100, function ($subscribers) use ($event) {
            foreach ($subscribers as $subscriber) {
                dispatch(new SendBulkEmailJob($subscriber, $event->campaign));
            }
        });
    }
}
