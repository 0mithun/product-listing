<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['frontend_setlang'])->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/lang/{lang}', function($lang){
        session()->put('frontend_lang', $lang);
        app()->setLocale($lang);

        return back();
    });

});


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



Route::fallback(function () {
    return 'Not found';
});


// Route::get('admin/live', function(){
//     return 'maintaince mode enable url';
// });

