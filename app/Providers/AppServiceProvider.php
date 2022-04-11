<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\Category;
use Illuminate\Support\Facades\App;
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
        Paginator::useBootstrap();if (! App::runningInConsole()) {
            if (Schema::hasTable('settings')) {
                // The "settings" table exists...
                $setting = Setting::first();
                if($setting){
                    view()->share('setting', $setting);
                    session()->put('commingsoon_mode', $setting->commingsoon_mode);
                }
            }
            if (Schema::hasTable('categories')) {
                $category_list = Category::tree()->whereNotNull('parent_id')->get()->toTree();

                view()->share('category_list', $category_list);
            }
        }
    }
}
