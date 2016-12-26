<?php

namespace App\Http\Controllers;

use Gzero\Repository\ContentRepository;
use Illuminate\Http\Request;
use Gzero\Core\Controllers\BaseController;

class HomeController extends BaseController {

    /**
     * @var ContentRepository
     */
    protected $contentRepo;

    public function __construct(ContentRepository $contentRepo)
    {
        $this->contentRepo = $contentRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contents = $this->contentRepo->getContents(
            [
                ['is_active', '=', true],
                ['is_on_home', '=', true]
            ],
            [
                ['is_promoted', 'DESC'],
                ['is_sticky', 'DESC'],
                ['published_at', 'DESC']
            ],
            $request->get('page', 1),
            option('general', 'default_page_size', 20)
        );

        $contents->setPath($request->url());

        return view('home', ['contents' => $contents]);
    }
}
