<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/2fa/resend', [App\Http\Controllers\TwoFactorController::class, 'resend'])->name('2fa.resend');
Route::get('2fa/enable', [App\Http\Controllers\TwoFactorController::class, 'enableTwoFactor'])->name('2fa.enable');
Route::post('2fa/verify', [App\Http\Controllers\TwoFactorController::class, 'verifyTwoFactor'])->name('2fa.verify');
Route::middleware(['auth','2fa'])->group(function () {


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();


