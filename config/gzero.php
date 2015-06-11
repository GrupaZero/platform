<?php
return [
    'domain'          => 'dev.gzero.pl',
    'siteName'        => 'G-ZERO CMS',
    'defaultPageSize' => 5,
    'multilang'       => [
        'enabled'   => true,
        'detected'  => false, // Do not change, changes in runtime!
        'subdomain' => false
    ],
    'block_type'      => [
        'basic' => 'Gzero\Core\Handler\Block\Basic',
        'menu'  => 'Gzero\Core\Handler\Block\Menu'
    ],
    'content_type'    => [
        'content'  => 'Gzero\Core\Handler\Content\Content',
        'category' => 'Gzero\Core\Handler\Content\Category'
    ]
];
