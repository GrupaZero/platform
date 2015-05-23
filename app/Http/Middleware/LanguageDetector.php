<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\RedirectResponse;


class LanguageDetector {

    /**
     * Config.
     *
     * @var Repository
     */
    protected $config;

    /**
     * @param Repository $config
     */
    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!preg_match('/^api/', $request->getHost()) && !in_array($request->segment(1), ['admin', '_debugbar'], true)) {
            if ($this->config->get('gzero.multilang.enabled') and !$this->config->get('gzero.multilang.detected')) {
                return new RedirectResponse(url('/en'));
            }
        }
        return $next($request);
    }

}
