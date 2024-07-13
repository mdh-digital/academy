<?php

use App\Http\Middleware\ForAdmin;
use App\Http\Middleware\ForStudent;
use App\Http\Middleware\ForTeacher;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        using: function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', 'verified', 'is_admin'])
                ->prefix('admin')
                ->group(base_path('routes/admin.php'));

            Route::middleware(['web', 'verified', 'is_teacher'])
                ->prefix('teacher')
                ->group(base_path('routes/teacher.php'));

            Route::middleware(['web', 'verified', 'is_student'])
                ->prefix('student')
                ->group(base_path('routes/student.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_admin'      => ForAdmin::class,
            'is_teacher'    => ForTeacher::class,
            'is_student'    => ForStudent::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
