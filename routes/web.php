<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post(
    '/buy-now',
    [App\Http\Controllers\BuyNowController::class, 'buyNow'])
    ->name('buy_now');
