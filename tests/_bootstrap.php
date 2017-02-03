<?php
// Here you can initialize variables that will be available to your tests

use Laravel\Passport\Passport;

if (file_exists(dirname(__DIR__) . '/.env.testing')) {
    (new \Dotenv\Dotenv(dirname(__DIR__), '.env.testing'))->load();
}

// We need to tell Laravel Passport where to find oauth keys
Passport::loadKeysFrom(dirname(__DIR__) . '/vendor/gzero/testing/oauth/');

\Codeception\Configuration::$defaultSuiteSettings['modules']['config']['Db'] = [
    'dsn'      => 'pgsql:host=' . env('DB_HOST', 'db_tests_server') .
        ';port=' . env('DB_PORT', 5432) .
        ';dbname=' . env('DB_DATABASE', 'gzero_cms') .
        ';user=' . env('DB_USERNAME', 'gzero_cms') .
        ';password=',
    'user'     => env('DB_USERNAME', 'postgres'),
    'password' => env('DB_PASSWORD', ''),
    'dump'     => 'vendor/gzero/testing/db/dump.sql',
    'populate' => true,
    'cleanup'  => true
];