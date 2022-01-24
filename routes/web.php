<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Social\SocialLoginController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


// ========================================================
//====================social Login=========================
// ========================================================
// Route::get('login/{provider}', [SocialLoginController::class, 'redirectOnProviders'])->name('social-login');
// Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback']);

// ========================================================
//====================Multi Guard Admin====================
// ========================================================


// ========================================================
//====================Artisan command======================
// ========================================================

// Route::get('route-clear', function () {
//     \Artisan::call('route:clear');
//     dd("Route Cleared");
// });
// Route::get('optimize', function () {
//     \Artisan::call('optimize');
//     dd("Optimized");
// });
// Route::get('view-clear', function () {
//     \Artisan::call('view:clear');
//     dd("View Cleared");
// });
// Route::get('view-cache', function () {
//     \Artisan::call('view:cache');
//     dd("View cleared and cached again");
// });
// Route::get('config-cache', function () {
//     \Artisan::call('config:cache');
//     dd("configuration cleared and cached again");
// });

// ========================================================
//====================All Auth Logout======================
// ========================================================
Route::post('auth-logout', function (Request $request) {
    if ($request->auth === 'customer') {
        Auth::guard('customer')->logout();
        return redirect()->route('customer.login');
    }
    if ($request->auth === 'company') {
        Auth::guard('company')->logout();
        return redirect()->route('company.login');
    }
    if ($request->auth === 'student') {
        Auth::guard('student')->logout();
        return redirect()->route('student.login');
    }
    if ($request->auth === 'teacher') {
        Auth::guard('teacher')->logout();
        return redirect()->route('teacher.login');
    }
    if ($request->auth === 'user') {
        Auth::guard('user')->logout();
        return redirect()->route('user.login');
    }
})->name('auth.logout');


Route::fallback(function () {
    return 'Not found';
});
