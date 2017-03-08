<?php

namespace Nht\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('bigger', function($attribute, $value, $parameters)
        {
            return $value >= $parameters[0];
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment('local') && config('app.debug') == true)
        {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }

        /**
         * Metadata
         */
        $this->app->singleton('Setting', function ($app) {
            $settingRepository = $this->app->make('Modules\Setting\Repositories\SettingRepository');
            return new \Nht\Hocs\Core\Metadata\Metadata($settingRepository);
        });
    }
}
