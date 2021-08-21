<?php

use App\Http\Controllers\Auth\Candidate\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Candidate\LoginController;


Route::prefix('candidate')->name('candidate.')->group(function () {
    Route::middleware('guest:candidate')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('candidate.login');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
    });

    Route::get('home', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth:candidate');
});
