<?php

namespace App\Providers;

use Gzero\Core\Menu\Link;
use Gzero\Core\Menu\Register;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'account.menu',
            function ($view) {
                $menu = app('gzero.menu.account');
                $user = auth()->user();
                /** @var $menu Register */
                $menu->add(new Link(route('account'), trans('user.my_account'), 100));
                if ($user && $user->isSuperAdmin()) {
                    $menu->add(new Link(route('account.oauth'), trans('user.oauth'), 200));
                }
                $view->with('menu', $menu->getMenu());
            }
        );

        view()->composer(
            'includes.disqus.disqus',
            function ($view) {
                $data = [];
                $user = auth()->user();
                if ($user && !$user->isGuest()) {
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
}
