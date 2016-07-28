<?php


namespace KevinEm\YextLaravel;


use Illuminate\Support\ServiceProvider;
use KevinEm\Yext\Yext;

class YextLaravelServiceProvider extends ServiceProvider
{

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $config = $this->app['path.config'] . '/yext.php';

        $this->publishes([
            __DIR__ . '/../config/config.php' => $config
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'yext');

        $this->app->bind('yext-laravel', $this->createYextLaravelClosure());
    }

    /**
     * @return \Closure
     */
    protected function createYextLaravelClosure()
    {
        return function ($app) {
            return new Yext($app['config']['yext']);
        };
    }
}