<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;

class TransporterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Nht\Hocs\Transporters\TransporterRepository', 'Nht\Hocs\Transporters\DbTransporterRepository');
    }
}
