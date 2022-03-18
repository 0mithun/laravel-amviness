<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Modules\Category\Entities\Category;

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

        $setting = Setting::first();
        $categories = Category::oldest('order')->get();
        view()->share('setting', $setting);
        view()->share('categories', $categories);
        session()->put('commingsoon_mode', $setting->commingsoon_mode);
    }
}
