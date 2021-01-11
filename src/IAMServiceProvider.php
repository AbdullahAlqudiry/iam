<?php

namespace Alqudiry\Iam;

use Illuminate\Support\ServiceProvider;

class IAMServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/app' => app_path('../app'),
            __DIR__ . '/config' => app_path('../config'),
            __DIR__ . '/database' => app_path('../database'),
        ]);
    }
}
