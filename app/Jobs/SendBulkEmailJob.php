<?php

namespace App\Jobs;

use App\Mail\CampaignEmail;
use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendBulkEmailJob implements ShouldQueue
{
    use Queueable;
    public $tries = 3; // Number of attempts to process the job
    public $backoff = 60; // Delay in seconds before retrying the job
    public $timeout = 120; // Maximum time in seconds the job can run

    public $subscriber;

    /**
     * Create a new job instance.
     */
    public function __construct(Subscription $subscriber)
    {
        $this->subscriber = $subscriber;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Log the email sending attempt
        Log::channel('subscription')->info("Mail göndərilir: " . $this->subscriber->email);
        Mail::to($this->subscriber->email)
            ->send(new CampaignEmail($this->subscriber));
    }

    public function failed(\Throwable $e)
    {
        Log::channel('subscription')->error("Mail göndərilə bilmədi: " . $this->subscriber->email);
    }
}
