<?php namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class AccountController
 *
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class AccountController extends BaseController {

    public function account()
    {
        /**@TODO we need proper user menu method */
        return view('account.index', ['menu' => App::make('user.menu')->getMenu(), 'user' => auth()->user()]);
    }

    public function edit()
    {
        return view('account.edit', ['menu' => App::make('user.menu')->getMenu(), 'user' => auth()->user()]);
    }

    public function welcome(Request $request)
    {
        if (session()->has('showWelcomePage')) {
            session()->forget('showWelcomePage');

            return view('auth.welcome', ['method' => $request->get('method')]);
        }

        return redirect()->route('home');

    }
}
