<?php

class HomeCest
{
    public function canSeeHomePage(FunctionalTester $I)
    {
        $I->amOnPage('/');
        $I->seeResponseCodeIs(200);
        $I->see('Page example', 'h1');
        $I->seeLink('Login');
        $I->seeLink('Register');
    }
}
