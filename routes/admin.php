<?php

use App\Http\Controllers\Administrator\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('app')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
});
