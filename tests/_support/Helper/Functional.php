<?php namespace Platform\Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

use Codeception\TestInterface;

class Functional extends \Codeception\Module {

    public function _before(TestInterface $test)
    {
        $env = $test->getMetadata()->getEnv();
        if (!empty($env) && in_array('ml_disabled', $env, true)) {
            putenv('MULTILANG_ENABLED=false');
        } else {
            putenv('MULTILANG_ENABLED');
        }
    }

}
