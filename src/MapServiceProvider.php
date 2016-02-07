<?php

namespace samjoyce777\LaravelStaticMap;

use Illuminate\Support\ServiceProvider;
use Illuminate\Html\FormBuilder;

class MapServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/map.php' => config_path('map.php')
        ], 'config');
    }

   /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Map', 'samjoyce777\LaravelStaticMap\Map');

        $config = require(__DIR__.'/config/map.php');

        config($config);
    }

}
