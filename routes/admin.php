<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;



Route::get('/home', [App\Http\Controllers\Admin\LoginController::class, 'index']);
Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');



Route::middleware(['auth:admin'])->group(function () {

    Route::get('/home', function(){
        return 'admin home';
    });
    //Dashboard Route
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // //Profile Route
    Route::get('/profile/settings', [ProfileController::class, 'setting'])->name('profile.setting');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'profile_password_update'])->name('profile.password.update');

    //Roles Route
    Route::resource('role', RolesController::class);

    //Users Route
    Route::resource('user', UserController::class);


    // ========================================================
    //====================Setting==============================
    // ========================================================
    Route::get('settings/website', [SettingsController::class, 'website'])->name('settings.website');
    Route::put('settings/website', [SettingsController::class, 'websiteUpdate'])->name('settings.website.update');

    Route::get('settings/layout', [SettingsController::class, 'layout'])->name('settings.layout');
    Route::put('settings/layout', [SettingsController::class, 'layoutUpdate'])->name('settings.layout.update');

    Route::get('settings/color', [SettingsController::class, 'color'])->name('settings.color');
    Route::put('settings/color', [SettingsController::class, 'colorUpdate'])->name('settings.color.update');

    Route::get('settings/custom', [SettingsController::class, 'custom'])->name('settings.custom');
    Route::put('settings/custom', [SettingsController::class, 'custumCSSJSUpdate'])->name('settings.custom.update');
});
