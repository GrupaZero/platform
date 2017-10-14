<?php namespace App\Http\Controllers;

use Gzero\Base\Http\Controller\Controller;

class HomeController extends Controller {

    /**
     * Show account main page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blocks = [
            ['title' => 'First Block', 'body' => 'First block body text'],
            ['title' => 'Second Block', 'body' => 'Second block body text']
        ];

        return view('home', ['blocks' => $blocks]);
    }
}
