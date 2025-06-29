<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
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
