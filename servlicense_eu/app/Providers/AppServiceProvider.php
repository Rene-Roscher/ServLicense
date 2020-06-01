<?php

namespace App\Providers;

use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('breadcrumbs', function ($expression) {
            $params = null;
            eval("\$params = [$expression];");
            list($param1, $param2) = $params;
            return view('breadcrumbs', ['name' => $param1, 'title' => $param2])->render();
        });
    }

    public function registerBladeDirective($key, $value)
    {
        Blade::directive($key, function () use ($value) {
            return $value;
        });
    }

}
