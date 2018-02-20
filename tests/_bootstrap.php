<?php
// Here you can initialize variables that will be available to your tests

use Codeception\Lib\Driver\PostgreSql;

if (file_exists(dirname(__DIR__) . '/.env.testing') && !getenv('CI_ACCEPTANCE_RUN')) {
    (new \Dotenv\Dotenv(dirname(__DIR__), '.env.testing'))->load();
}

$host = env('DB_HOST', env('DB_HOST', 'db_server'));
$port = env('DB_PORT', env('DB_PORT', 5432));
$dbName = env('DB_DATABASE', env('DB_DATABASE', 'gzero_cms'));
$user = env('DB_USERNAME', env('DB_USERNAME', 'gzero_cms'));
$password = env('DB_PASSWORD', env('DB_PASSWORD', ''));

$sql = file_get_contents(__DIR__ . '/db/dump.sql');
// remove C-style comments (except MySQL directives)
$sql = preg_replace('%/\*(?!!\d+).*?\*/%s', '', $sql);
if (!empty($sql)) {
    // split SQL dump into lines
    $sql = preg_split('/\r\n|\n|\r/', $sql, -1, PREG_SPLIT_NO_EMPTY);
}

$db = new PostgreSql("pgsql:host=$host port=$port dbname=$dbName", $user, $password);

$db->cleanup();
$db->load($sql);

// We want to save all output files in platform _output dir
\Codeception\Configuration::$defaultConfig['paths'] = ['output' => __DIR__ . '/_output'];

if (!getenv('CI_ACCEPTANCE_RUN')) {
    $dockerHostIp = exec("/sbin/ip route|awk '/default/ { print $3 }'");
    \Codeception\Configuration::$defaultSuiteSettings['modules']['config'] =
        [
            'WebDriver' => [
                'host' => $dockerHostIp, // Docker host ip
                'url' => 'http://dev.gzero.pl:8080' // We're binding web_server to 8080
            ]
        ];
}
