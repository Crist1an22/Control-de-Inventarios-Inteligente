<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
<<<<<<< HEAD
use App\Http\Middleware\CheckRole;
=======
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
<<<<<<< HEAD
        $middleware->alias([
            'role' => CheckRole::class,
        ]);
=======
        //
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
