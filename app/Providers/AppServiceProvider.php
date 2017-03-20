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

        view()->composer(
            'includes.disqus.disqus',
            function ($view) {
                $data = [];
                $user = auth()->user();
                if (!$user->isGuest()) {
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
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(DebugbarServiceProvider::class);
            $this->app->register(IdeHelperServiceProvider::class);
        }
    }
}
