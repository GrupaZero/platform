<?php

class BasicCest
{
    public function canSeeHomePage(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Page example', 'h1');
        $I->click('Login');
        $I->makeScreenshot('basic');
    }
}
