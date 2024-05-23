<?php

use App\Http\Middleware\IsRevisor;
use Illuminate\Foundation\Application;
use App\Http\Middleware\SetLocaleMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append:[SetLocaleMiddleware::class]);
        $middleware->alias(['IsRevisor' => IsRevisor::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
