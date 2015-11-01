<?php namespace platform;

use DateTime;

class AccountCest
{

    public function _before(FunctionalTester $I)
    {
        $I->haveRecord(
            'Users',
            [
                'firstName' => 'Johny',
                'lastName' => 'Doe',
                'email' => 'john@doe.com',
                'password' => bcrypt('test123'),
                'createdAt' => new DateTime(),
                'updatedAt' => new DateTime(),
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

    public function canChangeFirstNameAndLastName(FunctionalTester $I)
    {
        $I->wantTo('change user first name & last name');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Change password');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('Users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['firstName' => 'xxx', 'lastName' => 'yyy', '_token' => $token]);
        $I->seeResponseCodeIs(200);
        $I->amOnPage('/en');
        $I->see('xxx yyy');
    }

    public function canChangePassword(FunctionalTester $I)
    {
        $I->wantTo('change user password');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Change password');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('Users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['password' => 'test124', 'password_confirmation' => 'test124', '_token' => $token]);
        $I->seeResponseCodeIs(200);
        $I->logout();
        $I->login('john@doe.com', 'test124');
    }

    public function canNotChangePasswordWithoutConfirmation(FunctionalTester $I)
    {
        $I->wantTo('change user password');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Change password');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('Users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['password' => 'test124', '_token' => $token]);
        $I->seeResponseCodeIs(400);
    }

}

