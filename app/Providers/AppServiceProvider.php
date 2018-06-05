<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Illuminate\Support\Facades\Schema::defaultStringLength(191);

        Auth::provider('myeloquent', function($app, array $config) {
            return new \App\Services\MyEloquentUserProvider($app['hash'], $config['model']);
        });

        Auth::extend('token2', function($app, $name, array $config){
            return new \App\Services\TokenGuard2(Auth::createUserProvider($config['provider']), $app['request']);   //返回自定义 guard 实例
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
