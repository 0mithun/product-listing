<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Social\SocialLoginController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return redirect(route('login'));
    // return view('welcome');
});

Auth::routes();

Route::middleware(['auth:super_admin'])->group(function () {
    //Dashboard Route
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('home');

    //Profile Route
    Route::get('/profile/settings', [ProfileController::class, 'setting'])->name('profile.setting');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'profile_update'])->name('profile.update');
    Route::put('/profile/password/{id}', [ProfileController::class, 'profile_password_update'])->name('profile.password.update');

    //Roles Route
    Route::resource('role', RolesController::class);

    //Users Route
    Route::resource('user', UserController::class);

    //====================Settings=========================
    Route::get('settings/{page}', [SettingsController::class, 'index'])->name('setting');
    Route::put('settings/website', [SettingsController::class, 'website'])->name('setting.website');
});

// ========================================================
//====================social Login=========================
// ========================================================
Route::get('login/{provider}', [SocialLoginController::class, 'redirectOnProviders'])->name('social-login');
Route::get('auth/{provider}/callback', [SocialLoginController::class, 'callback']);

// ========================================================
//====================Multi Guard Admin====================
// ========================================================
Route::get('/admin/home', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('login.admin');
Route::post('/admin/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login');

// ========================================================
//====================Mode change==========================
// ========================================================
Route::post('mode/change', [ThemeController::class, 'mode_change'])->name('mode.change');

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
