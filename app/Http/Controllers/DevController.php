<?php
use Gzero\Repository\ContentRepository;

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
        parent::__construct();
        $this->repository = $repository;
    }

    public function index()
    {
        // All trees
        //$params['filter'] = ['type' => ['value' => 'category', 'relation' => null]];

        $nodes = $this->repository->getContents(
            [],
            [],
            null
        );

        return View::make(
            'dev.index',
            [
                'tree' => $this->repository->buildTree($nodes),
            ]
        );
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
        return View::make(
            'emails.' . $email,
            ['token' => 'dummy-token'] // auth reminder view dummy data
        );
    }

}
