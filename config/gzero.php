<?php
return [
    'domain'                         => 'dev.gzero.pl',
    'siteName'                       => 'G-ZERO CMS',
    'defaultPageSize'                => 5,
    'seoTitleAlternativeField'       => 'title',
    'seoDescriptionAlternativeField' => 'body',
    'seoDescLength'                  => 160,
    'siteDesc'                       => 'Content management system.',
    'multilang'                      => [
        'enabled'   => true,
        'detected'  => false, // Do not change, changes in runtime!
        'subdomain' => false
    ],
    //'upload'       => [                       TODO: we cant use helpers here
    //    'path'   => public_path('uploads'),
    //    'public' => asset('uploads')
    //],
    'block_type'                     => [
        'basic' => 'Gzero\Core\Handler\Block\Basic',
        'menu'  => 'Gzero\Core\Handler\Block\Menu'
    ],
    'content_type'                   => [
        'content'  => 'Gzero\Core\Handler\Content\Content',
        'category' => 'Gzero\Core\Handler\Content\Category'
    ]
];
