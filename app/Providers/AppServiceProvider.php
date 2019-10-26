<?php

namespace App\Providers;

use App\Helper\Asset;
use Illuminate\Support\Facades\Gate;
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

        $this->app->singleton('Asset', function ($app) {
            $settingRepository = $this->app->make('Modules\Setting\Repositories\SettingRepository');
            $item = $settingRepository->getByKey('static_vers');
            return new Asset($item->value);
        });

        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        $this->definePermissions();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    public function definePermissions() {
        $permissions = config('permission');
        foreach ($permissions as $alias => $name) {
            Gate::define($alias, function ($user) use ($name) {
                if (!is_array($name)) $name = [$name];
                foreach ($name as $_name) {
                    if ($user->havePermission($_name)) {
                        return true;
                    }
                }
                return false;
            });
        }
    }
}
