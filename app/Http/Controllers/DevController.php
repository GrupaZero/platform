<?php namespace App\Http\Controllers;

use Gzero\Repository\ContentRepository;
use Illuminate\Support\Facades\App;

/**
 * This file is part of the GZERO CMS package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Class ${NAME}
 *
 * @author     Adrian Skierniewski <adrian.skierniewski@gmail.com>
 * @copyright  Copyright (c) 2015, Adrian Skierniewski
 */
class DevController extends BaseController {

    public function __construct(ContentRepository $repository)
    {
        // show dev page only for logged users
        if (!app('auth')->check() || !app('auth')->user()->isAdmin) {
            App::abort(404);
        }

        parent::__construct();
        $this->repository = $repository;
    }

    public function index()
    {
        // All trees
        //$params['filter'] = ['type' => ['value' => 'category', 'relation' => null]];

        $nodes = $this->repository->getContentsByLevel([], [], null);

        return view('dev.index', ['tree' => $nodes,]);
    }


    /**
     * Emails preview
     *
     * @param string $email view name in views.emails directory
     *
     * @return \Illuminate\View\View
     */
    public function emails($email)
    {
        return view(
            'emails.' . $email,
            ['token' => 'dummy-token'] // auth reminder view dummy data
        );
    }

}
