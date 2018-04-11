<?php

namespace PandaAdmin\Laravel;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../dist' => public_path('vendor/panda-admin'),
            __DIR__ . '/../config/config.php' => config_path('panda-admin/config.php'),
            __DIR__ . '/../config/contenttypes.php' => config_path('panda-admin/contenttypes.php'),
        ], 'panda-admin');

        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'panda-admin');
    }
}