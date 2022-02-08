<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/pay-tariff/{tariff}/{admin?}', [PaymentController::class, 'tariff'])
    ->middleware(['auth'])
    ->name('pay-tariff');
Route::post('/pay-tariff/post/{admin?}', [PaymentController::class, 'tariff_post'])
->middleware(['auth'])
->name('tariff.post');
Route::get('/deposit-funds/{admin?}', [PaymentController::class, 'deposit'])
    ->middleware(['auth'])
    ->name('deposit-funds');
Route::post('/deposit/post/{admin?}', [PaymentController::class, 'deposit_post'])
    ->middleware(['auth'])
    ->name('deposit.post');
Route::get('/withdraw-funds', [PaymentController::class, 'withdraw'])
    ->middleware(['auth'])
    ->name('withdraw-funds');
Route::get('/payment-error/{type?}', [PaymentController::class, 'error'])
    ->middleware(['auth'])
    ->name('payment-error');
Route::get('/payment-success', [PaymentController::class, 'success'])
    ->middleware(['auth'])
    ->name('payment-success');
