<?php

use App\Events\ProductViewed;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

// Controllers
Route::apiResource('events', EventController::class);
Route::apiResource('tickets', TicketController::class);

// Authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::prefix('files')->group(function () {
    Route::post('/upload', [FileController::class, 'upload']);
    Route::get('/{filename}', [FileController::class, 'read']);
    Route::delete('/{filename}', [FileController::class, 'delete']);
    Route::get('/download/{filename}', [FileController::class, 'download']);
    Route::get('/exists/{filename}', [FileController::class, 'exists']);
});


Route::get('/products/{id}', function ($id) {
    $cacheKey = "product:{$id}";

    $product = Cache::remember($cacheKey, 60, function () use ($id) {
        return Product::findOrFail($id);
    });

    // Event fire et (Queue ilə RabbitMQ-ya düşəcək)
    event(new ProductViewed($product));

    return response()->json([
        'product' => $product,
        'message' => 'Product fetched (DB or cache), event fired!'
    ]);
});
