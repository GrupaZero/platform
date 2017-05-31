<?php

namespace App\Http\Middleware;

use Closure;

class CheckPager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty($request->get('page')) || ($request->has('page') && !ctype_digit($request->get('page')))) {
            $request->merge([
                'page' => 1
            ]);
        }
        
        return $next($request);
    }
}
