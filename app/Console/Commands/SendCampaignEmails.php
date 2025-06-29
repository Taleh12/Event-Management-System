<?php

namespace App\Console\Commands;

use App\Jobs\SendBulkEmailJob;
use App\Models\Subscription;
use Illuminate\Console\Command;

class SendCampaignEmails extends Command
{
    protected $signature = 'campaign:send';
    protected $description = 'Send campaign emails to all subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Subscription::chunk(100, function ($subscribers) {
            foreach ($subscribers as $subscriber) {
                SendBulkEmailJob::dispatch($subscriber);
            }
        });

        $this->info('Kampaniya email-ləri Queue-ya göndərildi!');
    }
}
