<?php

use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [LocaleMiddleware::class]);

        /** 2 ways to assign middleware stack
         * first way */
        $middleware->alias([
            'role' => RoleMiddleware::class
        ]);
        // second way (customize manually middleware stack)
        // $middleware->use([
        //     \App\Http\Middleware\Admin::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
