<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResumeController;

Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
});

Route::prefix('resume')->group(function () {
    Route::post('/store', [ResumeController::class, 'store'])->name('resume.store');
});


include __DIR__ . '/auth.php';
include __DIR__ . '/admin.php';