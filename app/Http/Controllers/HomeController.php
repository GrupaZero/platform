<?php namespace App\Http\Controllers;

use Gzero\Base\Http\Controller\Controller;

class HomeController extends Controller {

    /**
     * Show the application's home page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Viewz
     */
    public function index()
    {
        $blocks = [
            'sidebarLeft'  => [
                ['title' => 'First Block', 'body' => 'First block body text'],
            ],
            'sidebarRight' => [
                ['title' => 'Second Block', 'body' => 'Second block body text']
            ]
        ];

        return view('home', ['blocks' => $blocks]);
    }
}
