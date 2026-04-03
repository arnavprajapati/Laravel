<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\GlobalMiddleware;
use App\Http\Middleware\CMMiddleware;
use App\Http\Middleware\CountryMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // register your middleware here
        // $middleware->alias([
        //     'agecheck' => App\Http\Middleware\MiddlewarePO::class,
        // ]);

        // register middleware globally 
        // $middleware->append(GlobalMiddleware::class);

        // $middleware->alias([
        //     'age' => CMMiddleware::class,
        //     'country' => CountryMiddleware::class,
        // ]);

        // task -> create a middleware globally there we need to authorize url with token 123a if u are authorized then a new view will be returned which will display a tour picutre other wise it will showcase custom error message you are outsider
        $middleware->append(App\Http\Middleware\TokenAuthMiddleware::class);

    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
