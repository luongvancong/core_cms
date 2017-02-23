<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;


class CarServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('Nht\Hocs\Cars\CarRepository', 'Nht\Hocs\Cars\DbCarRepository');
    }
}
