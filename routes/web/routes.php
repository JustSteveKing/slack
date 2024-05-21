<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::as('pages:')->group(static function (): void {
    Route::middleware(['guest'])->group(static function (): void {
        Route::prefix('auth')->as('auth:')->group(base_path(
            path: 'routes/web/auth.php',
        ));
        Route::prefix('oauth')->as('oauth:')->group(base_path(
            path: 'routes/web/oauth.php',
        ));
    });

    Route::middleware(['auth'])->group(static function (): void {
        Route::view('auth/onboarding', 'pages.auth.onboarding')->name('auth:onboarding');
    });

    Route::middleware(['auth','onboarding'])->group(static function (): void {
        Route::view('/', 'pages.index')->name('home');
        Route::prefix('channels')->as('channels:')->group(base_path(
            path: 'routes/web/channels.php',
        ));
    });
});
