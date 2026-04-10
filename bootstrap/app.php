<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Localization;
use App\Http\Middleware\Customauth;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // تسجيل middleware كـ alias (اختياري)
        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'Customauth'=>Customauth::class,
        ]);
        $middleware->web(append:[
            \App\Http\Middleware\Localization::class,
        ]);

    
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        /*  $exceptions->handle(\App\Exceptions\CustomException::class, 'CustomHandler');*/
    })->create();
