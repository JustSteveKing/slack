<?php

declare(strict_types=1);

use App\Http\Controllers\Channels;
use Illuminate\Support\Facades\Route;

Route::get('{reference}', Channels\ShowController::class)->name('show');
