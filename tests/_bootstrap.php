<?php
// Here you can initialize variables that will be available to your tests

if (file_exists(dirname(__DIR__) . '/.env.testing')) {
    (new \Dotenv\Dotenv(dirname(__DIR__), '.env.testing'))->load();
}

\Codeception\Configuration::$defaultSuiteSettings['modules']['config']['Db'] = [
    'dsn'      => 'mysql:host=' . env('DB_HOST', 'dev_db_tests') . ';dbname=' . env('DB_DATABASE', 'gzero-cms'),
    'user'     => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'dump'     => 'vendor/gzero/testing/db/dump.sql',
    'populate' => true,
    'cleanup'  => true
];