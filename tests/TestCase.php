<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

    protected $baseUrl = 'http://localhost';

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return 'http://' . $this->app['config']['gzero.domain'];
    }

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
        \App::setLocale('en'); // We're setting default locale on test env
        $app['config']['gzero.multilang.detected'] = true;
        $app['Illuminate\Contracts\Console\Kernel']->call('migrate', ['--path' => '/vendor/gzero/cms/src/migrations']);
        return $app;
    }

}
