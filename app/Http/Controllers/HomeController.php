<?php namespace App\Http\Controllers;

use Gzero\Cms\Repositories\ContentReadRepository;
use Gzero\Core\Http\Controllers\Controller;

class HomeController extends Controller {

    /**
     * Show the application's home page.
     *
     * @param ContentReadRepository $repository content read repository
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ContentReadRepository $repository)
    {
        return view('home', ['contents' => $repository->getForHomepage(language(app()->getLocale()))]);
    }
}
