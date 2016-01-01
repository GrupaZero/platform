<?php namespace App\Providers;

use Gzero\Core\AbstractServiceProvider;

class AppServiceProvider extends AbstractServiceProvider {

    /**
     * List of additional providers
     *
     * @var array
     */
    protected $providers = [
        'Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider',
        'Barryvdh\Debugbar\ServiceProvider',
    ];

    /**
     * List of service providers aliases
     *
     * @var array
     */
    protected $aliases = [
        'Debugbar'  => 'Barryvdh\Debugbar\Facade'
    ];

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
     * This service provider is a great spot to register your various container
     * bindings with the application. As you can see, we are registering our
     * "Registrar" implementation here. You can add your own bindings too!
     *
     * @return void
     */
    public function register()
    {
        $this->registerAdditionalProviders();
        $this->registerProvidersAliases();
        $this->app->bind(
            'Illuminate\Contracts\Auth\Registrar',
            'App\Services\Registrar'
        );
    }

}
