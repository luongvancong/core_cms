<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if($this->app->environment() !== 'production' && config('app.debug') == true)
        {
            $this->app->register('Barryvdh\Debugbar\ServiceProvider');
        }

        $this->app->register('Nwidart\Modules\LaravelModulesServiceProvider');

        // Register a singleton Upload
        $this->app->singleton('Upload', function() {
            $config = config('upload');
            return new \App\Hocs\Core\Uploads\Upload($config);
        });

        $this->app->singleton('Uploader', function() {
            $upload = app('Upload');
            return new \App\Hocs\Core\Uploads\Uploader($upload);
        });

        // Register a singleton ImageFactory
        $this->app->singleton('ImageFactory', function() {
            $upload = app('Uploader');
            $image  = app('App\Hocs\Core\Images\Image');
            return new \App\Hocs\Core\Images\ImageFactory($upload, $image);
        });

        /**
         * Metadata
         */
        $this->app->singleton('Setting', function ($app) {
            $settingRepository = $this->app->make('Modules\Setting\Repositories\SettingRepository');
            return new \App\Hocs\Core\Metadata\Metadata($settingRepository);
        });

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
