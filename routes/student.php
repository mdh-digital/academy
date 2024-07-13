<?php

use App\Http\Controllers\Student\HomeController;
use Illuminate\Support\Facades\Route;

Route::prefix('app')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('student.home');
});
