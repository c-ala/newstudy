<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        $this->app->singleton('App\Models\Setting', function ($app) {
            return new \App\Models\Setting();
        });

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //给页头组件起别名,参数左边时路径，右边是引用时的别名也就是组件名称
        Blade::component('admin.components.page_title', 'page_title');
    }
}
