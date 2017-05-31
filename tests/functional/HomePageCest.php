<?php namespace Platform;

class HomePageCest {

    /**
     * @param FunctionalTester $I
     */
    public function canSee301Redirect(FunctionalTester $I)
    {
        $I->wantTo('see 301 redirect from home page without lang');
        $I->stopFollowingRedirects();
        $I->amOnPage('/');
        $I->seeResponseCodeIs(301);
    }

    /**
     * @param FunctionalTester $I
     */
    public function canViewHomePage(FunctionalTester $I)
    {
        $I->wantTo('view home page');
        $I->stopFollowingRedirects();
        $I->amOnPage('/en');
        $I->seeResponseCodeIs(200);
        $I->canSee('GZERO-CMS');
        $I->seeLink('Login', 'http://localhost/en/login');
        $I->seeLink('Register', 'http://localhost/en/register');
    }

    /**
     * @env ml_disabled
     *
     * @param FunctionalTester $I
     */
    public function canViewHomePageMlOff(FunctionalTester $I)
    {
        $I->wantTo('view home page without lang code in url');
        $I->stopFollowingRedirects();
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->canSee('GZERO-CMS');
        $I->seeLink('Login', 'http://localhost/login');
        $I->seeLink('Register', 'http://localhost/register');
    }

    /**
     * @param FunctionalTester $I
     */
    public function canNotSetPageNumberToValueOtherThanInteger(FunctionalTester $I)
    {
        $I->wantTo('can set page number to integer values only, otherwise set it to 1');

        $user = $I->haveUser();
        for ($i = 1; $i <= 30; $i++) {
            $I->haveContent([
                'type' => 'content',
                'is_active' => 1,
                'is_on_home' => 1
            ], $user);
        }

        $I->stopFollowingRedirects();
        $I->amOnPage('/en');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');

        // page number can be set if value is type of integer
        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=2');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>2</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=6');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>6</span></li>');

        // page number is set to 1 when it is set to non integer value, prevents sql injections
        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=2%25%27+UNION+ALL+SELECT+NULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%2CNULL%23');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=6%2F');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=44%2F');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=asd');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');

        // set page number to 1 when it is empty
        $I->stopFollowingRedirects();
        $I->amOnPage('/en?page=');
        $I->seeResponseCodeIs(200);
        $I->seeResponseContains('<li class="active"><span>1</span></li>');
    }
}

