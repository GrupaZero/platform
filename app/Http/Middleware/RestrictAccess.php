<?php namespace App\Http\Middleware;

/**
 * This file is part of the GZERO Platform package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class RestrictAccess
 *
 * @package    Gzero\ContentTypes
 * @author     Mateusz Urbanowicz <urbanowiczmateusz89@gmail.com>
 * @copyright  Copyright (c) 2015, Mateusz Urbanowicz
 */

class RestrictAccess {

    /**
     * Return 404 if user is not authenticated or got no admin rights
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function handle($request)
    {
        $auth = app()->make('auth');
        if (!$auth->check() || !$auth->user()->isAdmin) {
            abort(404, trans('HTTP.NOT_FOUND'));
        }
    }

}
