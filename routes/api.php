<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| These routes automatically get the "/api" prefix & API middleware.
|--------------------------------------------------------------------------
*/

Route::middleware('api')->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])
         ->name('api.orders.store');
});
