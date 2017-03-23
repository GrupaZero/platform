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

}

