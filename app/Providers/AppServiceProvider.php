<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        if (Schema::hasTable('settings')) {
            // The "settings" table exists...
            $setting = Setting::first();
            if($setting){
                view()->share('setting', $setting);
                session()->put('commingsoon_mode', $setting->commingsoon_mode);
            }
        }

    }
}
