
<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->name('home');

Route::get('/activities/create', [ActivityController::class, 'create'])
    ->name('activities.create');

Route::post('/activities', [ActivityController::class, 'store'])
    ->name('activities.store');
