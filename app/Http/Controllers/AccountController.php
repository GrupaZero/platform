<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gzero\Core\Controllers\BaseController;
use Gzero\Core\Menu\Register;

class AccountController extends BaseController {
    /**
     * @var Register
     */
    protected $userMenu;

    /**
     * AccountController constructor.
     *
     * @param Register $userMenu
     */
    public function __construct(Register $userMenu)
    {
        $this->userMenu = $userMenu;
        $this->userMenu->addLink(route('account'), 'user.my_account');
        $this->userMenu->addLink(route('account.oauth'), 'user.oauth');
    }

    public function account()
    {
        /**@TODO we need proper user menu method */
        return view('account.index', ['menu' => $this->userMenu->getMenu()]);
    }

    public function edit()
    {
        return view('account.edit', ['menu' => $this->userMenu->getMenu()]);
    }

    public function welcome(Request $request)
    {
        if (session()->has('showWelcomePage')) {
            session()->forget('showWelcomePage');

            return view('auth.welcome', ['method' => $request->get('method')]);
        }

        return redirect()->route('home');
    }

    public function oauth()
    {
        return view('account.oauth', ['menu' => $this->userMenu->getMenu()]);
    }
}