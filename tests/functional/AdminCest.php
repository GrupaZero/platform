<?php namespace Platform;

class AdminCest {
    // tests
    public function cantAccessAdminPanelAsRegularUser(FunctionalTester $I)
    {
        $I->wantTo('access admin panel as regular user');
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(404);
    }

    public function canAccessAdminPanelAsAdmin(FunctionalTester $I){
        $I->wantTo('access admin panel as admin');
        $I->loginAsAdmin();
        $I->amOnPage('/admin');
        $I->seeResponseCodeIs(200);
    }
}

