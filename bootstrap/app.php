<?php

use App\Http\Middleware\EnsureOtpIsVerified;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {

        // Register global middleware (if needed)
        $middleware->use([
            // Other global middleware...
        ]);

        // Register middleware groups
        $middleware->group('twofactorAuthentication', [
            EnsureOtpIsVerified::class,
        ]);

        // Add Sanctum middleware to API authentication
        $middleware->group('api', [
            EnsureFrontendRequestsAreStateful::class, // Allow frontend apps to authenticate
            'auth:sanctum', // Protect API routes using Sanctum
        ]);

        // Append middleware to existing groups if needed
        $middleware->appendToGroup('api', EnsureOtpIsVerified::class);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
