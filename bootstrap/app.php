<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Spatie\Permission\Middleware\RoleMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'authenticate' => App\Http\Middleware\AuthMiddleware::class,
            'role' => RoleMiddleware::class,
            'redirect_if_authenticated' =>App\Http\Middleware\RedirectIfAuthenticated::class,

        ]);
        //pengganti konfiguarsi middleware yang di versi laravel sebelumnya ada di kernel
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
