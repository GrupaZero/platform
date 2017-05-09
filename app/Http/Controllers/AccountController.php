<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gzero\Core\Controllers\BaseController;

class AccountController extends BaseController {

    public function account()
    {
        return view('account.index');
    }

    public function edit(Request $request)
    {
        return view('account.edit', ['isUserEmailSet' => strpos($request->user()->email, '@')]);
    }

    public function welcome(Request $request)
    {
        if (session()->has('showWelcomePage')) {
            session()->forget('showWelcomePage');

            return view('auth.welcome', ['method' => $request->get('method')]);
        }

        return redirect()->route('home');
    }

    public function oauth(Request $request)
    {

        if (!$request->user()->isSuperAdmin()) {
            return abort(404);
        }

        return view('account.oauth');
    }
}
