<?php namespace App\Http\Controllers;

use Gzero\Repository\ContentRepository;
use Illuminate\Http\Request;
use Illuminate\Filesystem\Filesystem;

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

    /**
     * @var Filesystem
     */
    protected $filesystem;

    public function __construct(ContentRepository $contentRepo, Filesystem $filesystem)
    {
        parent::__construct();
        $this->contentRepo = $contentRepo;
        $this->filesystem  = $filesystem;
    }

    public function index(Request $request)
    {
        $contents = $this->contentRepo->getContents(
            [
                ['isActive', '=', true],
                ['isOnHome', '=', true]
            ],
            [
                ['isPromoted', 'DESC'],
                ['isSticky', 'DESC']
            ],
            $request->get('page', 1),
            option('general', 'defaultPageSize', 20)
        );

        $contents->setPath($request->url());

        $slides = $this->filesystem->files(config('gzero.upload.path') . '/slides');

        foreach ($slides as $key => $slide) {
            $temp         = explode('/slides/', $slide);
            $slides[$key] = array_pop($temp);
        }

        return view(
            'home',
            [
                'contents' => $contents,
                'slides'   => $slides
            ]
        );
    }

}
