<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    public function updated(Product $product): void
    {
        Cache::forget("product:{$product->id}");
        Log::info("🟡 Redis cache cleared (update) → product:{$product->id}");
    }

    public function deleted(Product $product): void
    {
        Cache::forget("product:{$product->id}");
        Log::info("🔴 Redis cache cleared (delete) → product:{$product->id}");
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
