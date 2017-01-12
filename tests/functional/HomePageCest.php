<?php namespace Platform;

class HomePageCest {

    /**
     * @param FunctionalTester $I
     */
    public function canViewHomePage(FunctionalTester $I)
    {
        $I->wantTo('can view home page');
        $I->stopFollowingRedirects();
        $I->amOnPage('/en');
        $I->seeResponseCodeIs(200);
        $I->canSee('G-ZERO CMS');
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
        $I->wantTo('can view home page without lang code in url');
        $I->stopFollowingRedirects();
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->canSee('G-ZERO CMS');
        $I->seeLink('Login', 'http://localhost/login');
        $I->seeLink('Register', 'http://localhost/register');
    }

}

