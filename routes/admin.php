<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingsController;

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\SocialiteController;

/**
 * Auth routes
 */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware(['guest:admin'])->group(function () {
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.password.request');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('admin.password.update');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
});


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/',  [AdminController::class, 'dashboard']);

    //Dashboard Route
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // //Profile Route
    Route::get('/profile/settings', [ProfileController::class, 'setting'])->name('profile.setting');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'profile_update'])->name('profile.update');

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

    Route::put('settings/mode', [SettingsController::class, 'modeUpdate'])->name('settings.mode.update');

    Route::get('settings/color', [SettingsController::class, 'color'])->name('settings.color');
    Route::put('settings/color', [SettingsController::class, 'colorUpdate'])->name('settings.color.update');

    Route::get('settings/custom', [SettingsController::class, 'custom'])->name('settings.custom');
    Route::put('settings/custom', [SettingsController::class, 'custumCSSJSUpdate'])->name('settings.custom.update')
    ;
    Route::get('settings/email', [SettingsController::class, 'email'])->name('settings.email');
    Route::put('settings/email', [SettingsController::class, 'emailUpdate'])->name('settings.email.update');

    Route::post('settings/test-email', [SettingsController::class, 'testEmailSent'])->name('settings.email.test');

    Route::get('settings/system', [SettingsController::class, 'system'])->name('settings.system');
    Route::put('settings/mode/commingsoon', [SettingsController::class, 'modeCommingsoon'])->name('settings.mode.commingsoon');
    Route::put('settings/mode/maintaince', [SettingsController::class, 'modeMaintaince'])->name('settings.mode.maintaince');
    Route::put('settings/search/indexing', [SettingsController::class, 'searchIndexing'])->name('settings.search.indexing');
    Route::put('settings/google-analytics', [SettingsController::class, 'googleAnalytics'])->name('settings.google.analytics');
    Route::put('settings/facebook-pixel', [SettingsController::class, 'facebookPixel'])->name('settings.facebook.pixel');

    Route::get('settings/social-login', [SocialiteController::class, 'index'])->name('settings.social.login');
    Route::put('settings/social-login', [SocialiteController::class, 'update'])->name('settings.social.login.update');
});
