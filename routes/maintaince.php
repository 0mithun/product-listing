<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

use msztorc\LaravelEnv\Env;

$env = new Env();
$live_mode_enable_url = $env->getValue('APP_MAINTENCE_MODE_DISABLE_URL');
$live_mode_enable_url = ($live_mode_enable_url == "" || null) ? '/admin/site/live' : $live_mode_enable_url;


Route::get($live_mode_enable_url, function(){
    Artisan::call('up');

    return redirect('/');
})->name('live.mode.enable');
