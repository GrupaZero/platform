<?php namespace Platform;

use DateTime;

class AccountCest
{

    public function _before(FunctionalTester $I)
    {
        $I->haveRecord(
            'users',
            [
                'nick' => 'JohnyD',
                'first_name' => 'Johny',
                'last_name' => 'Doe',
                'email' => 'john@doe.com',
                'password' => bcrypt('test123'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        );
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function canAccessUserAccount(FunctionalTester $I)
    {
        $I->wantTo('can access user account');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSeeInCurrentUrl('/en/account/edit');
        $I->click('My Account', '.nav');
        $I->canSeeInCurrentUrl('/en/account');
    }
}

