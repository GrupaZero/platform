<?php

namespace App\Http\Controllers;

use Gzero\Repository\ContentRepository;
use Illuminate\Http\Request;

class HomeController extends BaseController {

    /**
     * @var ContentRepository
     */
    protected $contentRepo;

    public function __construct(ContentRepository $contentRepo)
    {
        parent::__construct();
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
                ['isActive', '=', true],
                ['isOnHome', '=', true]
            ],
            [
                ['isPromoted', 'DESC'],
                ['isSticky', 'DESC'],
                ['publishedAt', 'DESC']
            ],
            $request->get('page', 1),
            option('general', 'defaultPageSize', 20)
        );

        $contents->setPath($request->url());

        return view('home', ['contents' => $contents]);
    }
}
