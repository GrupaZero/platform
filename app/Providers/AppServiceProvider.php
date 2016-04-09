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
        view()->composer(
            'includes.disqus.disqus',
            function ($view) {
                $data = [];
                $user = auth()->user();
                if ($user) {
                    $data = [
                        "id"       => $user["id"],
                        "username" => $user->getPresenter()->displayName(),
                        "email"    => $user["email"],
                        //"avatar"    => $user["avatar"],
                    ];
                }

                function dsq_hmacsha1($data, $key)
                {
                    $blockSize = 64;
                    if (strlen($key) > $blockSize) {
                        $key = pack('H*', sha1($key));
                    }
                    $key  = str_pad($key, $blockSize, chr(0x00));
                    $ipad = str_repeat(chr(0x36), $blockSize);
                    $opad = str_repeat(chr(0x5c), $blockSize);
                    $hmac = pack(
                        'H*',
                        sha1(
                            ($key ^ $opad) . pack(
                                'H*',
                                sha1(
                                    ($key ^ $ipad) . $data
                                )
                            )
                        )
                    );
                    return bin2hex($hmac);
                }

                $message   = base64_encode(json_encode($data));
                $timestamp = time();
                $hmac      = dsq_hmacsha1($message . ' ' . $timestamp, config('disqus.api_secret'));
                $view->with('remoteAuthS3', "$message $hmac $timestamp");
            }
        );
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
