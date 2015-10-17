<?php

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = null)
 *
 * @SuppressWarnings(PHPMD)
 */
class FunctionalTester extends \Codeception\Actor {

    use _generated\FunctionalTesterActions;

    /**
     * Login in to page
     *
     * @param $email
     * @param $password
     */
    public function login($email, $password)
    {
        $I = $this;
        $I->amOnPage('/en/login');
        $I->fillField('email', $email);
        $I->fillField('password', $password);
        $I->click('button[type=submit]');
        $I->amOnPage('/en');
        $I->seeAuthentication();
    }

    /**
     * Login as admin in to page
     */
    public function loginAsAdmin()
    {
        $I = $this;
        $I->amOnPage('/en/login');
        $I->fillField('email', 'admin@gzero.pl');
        $I->fillField('password', 'test');
        $I->click('button[type=submit]');
        $I->seeAuthentication();
    }

    /**
     * Logout from page
     */
    public function logout()
    {
        $I = $this;
        $I->amOnPage('/en/logout');
        $I->canSeeCurrentUrlEquals('/en');
        $I->dontSeeAuthentication();
    }

}
