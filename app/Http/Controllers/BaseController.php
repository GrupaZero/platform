<?php

namespace App\Http\Controllers;

use Gzero\Core\Controllers\BaseController as GzeroBaseController;
use Illuminate\Http\Request;

class BaseController extends GzeroBaseController {

    private $lang;
    private $langs;

    public function __construct()
    {
        /** @TODO We need better way to access langs */
        $langRepository = app('Gzero\Repository\LangRepository');
        $this->lang     = $langRepository->getCurrent();
        $this->langs    = $langRepository->getAllEnabled();
        $this->viewShareLangs();
    }

    /**
     * Get current lang
     *
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Get All langs
     *
     * @return mixed
     */
    public function getLangs()
    {
        return $this->langs;
    }

    protected function getRequestedUrl()
    {

        if (config('gzero.multilang.enabled') and !config('gzero.multilang.subdomain')) {
            $segments = Request::segments();
            array_shift($segments);
            return implode('/', $segments);
        }
        return trim(Request::getRequestUri(), '/');
    }

    protected function viewShareLangs()
    {
        view()->share('lang', $this->getLang());
        view()->share('langs', $this->getLangs());
    }

}
