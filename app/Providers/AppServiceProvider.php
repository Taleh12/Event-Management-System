<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Subscription;
use App\Observers\ProductObserver;
use App\Observers\SubscriptionObserver;
use App\Repositories\EventRepository;
use App\Repositories\EventRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Subscription::observe(SubscriptionObserver::class);
        Product::observe(ProductObserver::class);
    }
}
