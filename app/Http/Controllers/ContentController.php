<?php

namespace App\Http\Controllers;

use Gzero\Core\DynamicRouter;
use Gzero\Repository\LangRepository;
use Gzero\Repository\RepositoryException;
use Gzero\Core\Controllers\BaseController;

class ContentController extends BaseController {

    /**
     * @var DynamicRouter
     */
    protected $dynamicRouter;

    /**
     * @var LangRepository
     */
    protected $langRepository;

    public function __construct(DynamicRouter $dynamicRouter, LangRepository $langRepository)
    {
        $this->dynamicRouter  = $dynamicRouter;
        $this->langRepository = $langRepository;
    }

    /**
     * Dynamic router handles CMS content
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function dynamicRouter()
    {
        // If no current language detected
        if (!$this->langRepository->getCurrent()) {
            abort(404);
        }
        try {
            return $this->dynamicRouter->handleRequest($this->getRequestedUrl(), $this->langRepository->getCurrent());
        } catch (RepositoryException $e) {
            abort(404);
        }
    }

    protected function getRequestedUrl()
    {
        if (config('gzero.multilang.enabled') and !config('gzero.multilang.subdomain')) {
            $segments = request()->segments();
            array_shift($segments);
            return implode('/', $segments);
        }
        return trim(request()->getRequestUri(), '/');
    }
}
