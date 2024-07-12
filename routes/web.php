<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'  => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/*
|--------------------------------------------------------------------------
| Custom Registration Process Flow
|--------------------------------------------------------------------------
*/

Route::prefix('register')->group(function () {
    Route::post("ask-phone-verification", [RegisterController::class, 'sendVerifyCode']);
    Route::post('whatsapp-verification', [RegisterController::class, 'verify']);
});
