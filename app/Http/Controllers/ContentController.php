<?php namespace App\Http\Controllers;

use Gzero\Core\DynamicRouter;
use Gzero\Entity\Lang;
use Gzero\Repository\RepositoryException;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class ContentController
 *
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2014, Adrian Skierniewski
 */
class ContentController extends BaseController {

    protected $router;

    public function __construct(DynamicRouter $router)
    {
        parent::__construct();
        $this->router = $router;
    }

    /**
     * Dynamic router handles CMS content
     *
     * @return View
     */
    public function dynamicRouter()
    {
        if (!$this->getLang()) { // If no current language detected
            App::abort(404);
        }

        try {
            return $this->router->handleRequest($this->getRequestedUrl(), $this->getLang());
        } catch (RepositoryException $e) {
            App::abort(404);
        }
    }
} 
