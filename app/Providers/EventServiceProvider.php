<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
  /**
   * The event listener mappings for the application.
   *
   * @var array
   */
  protected $listen = [
    Registered::class => [
      SendEmailVerificationNotification::class,
    ],
    \App\Events\TicketPurchased::class => [
      \App\Listeners\SendTicketPurchaseEmail::class,
    ],
    \App\Events\UserRegistered::class => [
      \App\Listeners\SendWelcomeEmailListener::class,
    ],
    \App\Events\CampaignStarted::class => [
      \App\Listeners\SendCampaignToSubscribers::class,
    ],
  ];

  /**
   * Register any events for your application.
   *
   * @return void
   */
  public function boot()
  {
    //
  }
}
