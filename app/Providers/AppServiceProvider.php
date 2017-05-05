<?php

namespace App\Providers;

use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Adapter\NullAdapter;
use League\Flysystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(env('APP_ENV') === 'testing'){
            // Use null adapter for tests
            app('filesystem')->extend(
                'nullAdapter',
                function () {
                    return new Filesystem(new NullAdapter());
                }
            );
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * To use Rollbar first install composer package: composer require jenssegers/rollbar
         *
         * if ($this->app->environment() === 'production' && env('ROLLBAR_TOKEN', false)) {
         *  $this->app->register(\Jenssegers\Rollbar\RollbarServiceProvider::class);
         * }
         */
        if ($this->app->environment() === 'local') {
            $this->app->register(DebugbarServiceProvider::class);
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }
}
