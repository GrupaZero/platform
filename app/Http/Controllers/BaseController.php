<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class BaseController
 *
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class BaseController extends Controller {

    private $lang;
    private $langs;

    public function __construct()
    {
        /** @TODO We need better way to access langs */
        $langRepository = App::make('Gzero\Repository\LangRepository');
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

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (!is_null($this->layout)) {
            $this->layout = view($this->layout);
        }
    }

    protected function getRequestedUrl()
    {
        if (Config::get('gzero.multilang.enabled') and !Config::get('gzero.multilang.subdomain')) {
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
