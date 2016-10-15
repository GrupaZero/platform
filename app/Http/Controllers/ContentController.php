<?php

namespace App\Http\Controllers;

use Gzero\Core\DynamicRouter;
use Gzero\Repository\RepositoryException;

class ContentController extends BaseController {

    /**
     * @var DynamicRouter
     */
    protected $dynamicRouter;

    public function __construct(DynamicRouter $dynamicRouter)
    {
        parent::__construct();
        $this->dynamicRouter = $dynamicRouter;
    }

    /**
     * Dynamic router handles CMS content
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function dynamicRouter()
    {
        if (!$this->getLang()) { // If no current language detected
            abort(404);
        }
        try {
            return $this->dynamicRouter->handleRequest($this->getRequestedUrl(), $this->getLang());
        } catch (RepositoryException $e) {
            abort(404);
        }
    }
}
