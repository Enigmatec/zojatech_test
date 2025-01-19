<?php

use App\Http\Middleware\JsonMiddleware;
use App\Http\Middleware\Organization;
use App\Http\Middleware\OrganizationMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(JsonMiddleware::class);
        $middleware->alias([
            'organization' => OrganizationMiddleware::class
        ]);
    
  
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
