<?php namespace platform;

use DateTime;

class HomePageCest
{

    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function canViewHomePage(FunctionalTester $I)
    {
        $I->wantTo('can view home page');
        $I->amOnPage('/en');
        $I->seeResponseCodeIs(200);
        $I->canSee('G-ZERO CMS');
        $I->seeLink('Login', 'http://localhost/en/login');
        $I->seeLink('Register', 'http://localhost/en/register');
    }

}

