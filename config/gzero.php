<?php
return [
    'domain'            => env('DOMAIN', 'localhost'),
    'app_version'       => env('APP_VERSION', 'latest'),
    'default_page_size' => 5,
    'use_users_nicks'   => env('USE_USERS_NICKS', true),
    'multilang'         => [
        'enabled'   => env('MULTILANG_ENABLED', true),
        'detected'  => false, // Do not change, changes in runtime!
        'subdomain' => env('MULTILANG_SUBDOMAIN', false)
    ]
];
