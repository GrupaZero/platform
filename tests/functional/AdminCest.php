<?php namespace platform;

class AdminCest {

    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function cant_access_admin_panel_as_regular_user(FunctionalTester $I)
    {
        $I->wantTo('access admin panel as regular user');
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(404);
    }

    public function can_access_admin_panel_as_superuser(FunctionalTester $I){
        $I->wantTo('access admin panel as regular superuser');
        $I->loginAsAdmin();
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(200);
    }

}

