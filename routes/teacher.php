<?php

use App\Http\Controllers\Teacher\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('app')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('teacher.home');
});
