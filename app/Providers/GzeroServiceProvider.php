<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class GzeroServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\User', function ($app) {
            return $app->make('App\Models\User');
        });
    }
}