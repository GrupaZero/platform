<?php

namespace App\Http\Middleware;

use Closure;
use Gzero\Repository\LangRepository;

class ViewShareLangs {

    /**
     * @var LangRepository
     */
    protected $langRepository;

    /**
     * ViewShareLangs constructor.
     *
     * @param LangRepository $langRepository
     */
    public function __construct(LangRepository $langRepository)
    {
        $this->langRepository = $langRepository;
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
        view()->share('lang', $this->langRepository->getCurrent());
        view()->share('langs', $this->langRepository->getAllEnabled());

        return $next($request);
    }
}
