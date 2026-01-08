<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post(
    '/buy-now',
    [App\Http\Controllers\BuyNowController::class, 'buyNow'])
    ->name('buy_now');


Route::get('/check-transaction-status', [App\Http\Controllers\BuyNowController::class, 'checkTransactionStatus'])
    ->name('check_transaction_status');


Route::get('/customer-thank', [App\Http\Controllers\BuyNowController::class, 'customerThank'])
    ->name('customer_thank');



Route::get('/product-detail', [App\Http\Controllers\BuyNowController::class, 'productDetail'])
    ->name('product_detail');
