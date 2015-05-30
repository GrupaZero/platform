<?php namespace App\Http\Controllers;

use Gzero\Repository\ContentRepository;

class HomeController extends BaseController {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * @var ContentRepository
     */
    protected $contentRepo;

    public function __construct(ContentRepository $contentRepo)
    {
        parent::__construct();
        $this->contentRepo = $contentRepo;
    }

    public function index()
    {
        $contents = $this->contentRepo->getContents(
            [
                'isOnHome' => [
                    'relation' => '',
                    'value'    => true
                ]
            ],
            [
                'isPromoted' => [
                    'relation'  => null,
                    'direction' => 'DESC',
                ],
                'isSticky'   => [
                    'relation'  => null,
                    'direction' => 'DESC'
                ]
            ],
            null
        );

        return view(
            'home',
            [
                'contents' => $contents
            ]
        );
    }

}
