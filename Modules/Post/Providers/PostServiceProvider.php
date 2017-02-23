<?php

namespace Modules\Post\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Modules\Post\Repositories\PostRepository', 'Modules\Post\Repositories\DbPostRepository');
        $this->app->bind('Modules\Post\Repositories\Category\PostCategoryRepository', 'Modules\Post\Repositories\Category\DbPostCategoryRepository');
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            __DIR__.'/../Config/config.php' => config_path('post.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/../Config/config.php', 'post'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = base_path('resources/views/modules/post');

        $sourcePath = __DIR__.'/../Resources/views';

        $this->publishes([
            $sourcePath => $viewPath
        ]);

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/post';
        }, \Config::get('view.paths')), [$sourcePath]), 'post');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = base_path('resources/lang/modules/post');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'post');
        } else {
            $this->loadTranslationsFrom(__DIR__ .'/../Resources/lang', 'post');
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
