<?php namespace App\Http\Controllers;

use Gzero\Repository\ContentRepository;
use Illuminate\Routing\Route;
use Gzero\Api\UrlParamsProcessor;
use Gzero\Api\Validator\ContentValidator;

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
     * @var ContentValidator
     */
    protected $validator;

    /**
     * @var UrlParamsProcessor
     */
    protected $processor;

    public function __construct(ContentRepository $contentRepo, UrlParamsProcessor $processor, ContentValidator $validator)
    {
        parent::__construct();
        $this->contentRepo = $contentRepo;
        $this->validator   = $validator->setData(\Input::all());
        $this->processor   = $processor;
    }

    public function index(Route $route)
    {
        $input    = $this->validator->validate('list');
        $params   = $this->processor->process($input)->getProcessedFields();
        $contents = $this->contentRepo->getContents(
            [
                'isOnHome' => [
                    'relation' => null,
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
            $params['page'],
            $params['perPage']
        );

        $contents->setPath($route->getPath());

        return view(
            'home',
            [
                'contents' => $contents
            ]
        );
    }

}
