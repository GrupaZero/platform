<?php namespace platform;

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

    public function canChangeNick(FunctionalTester $I)
    {
        $I->wantTo('change user nick');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Nick name');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['nick' => 'JohnyDoe', 'email' => 'john@doe.com',  '_token' => $token]);
        $I->seeResponseCodeIs(200);
        $I->amOnPage('/en/account');
        $I->see('JohnyDoe');
    }

    public function canChangeEmail(FunctionalTester $I)
    {
        $I->wantTo('change user email');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('E-mail');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['nick' => 'JohnyD', 'email' => 'john@doe.org', '_token' => $token]);
        $I->seeResponseCodeIs(200);
        $I->amOnPage('/en/account');
        $I->see('john@doe.org');
        $I->logout();
        $I->login('john@doe.org', 'test123');
        $I->amOnPage('/en/account');
        $I->see('john@doe.org');
    }

    public function canChangeFirstNameAndLastName(FunctionalTester $I)
    {
        $I->wantTo('change user first name & last name');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Change password');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['nick' => 'JohnyD', 'email' => 'john@doe.com', 'first_name' => 'xxx', 'last_name' => 'yyy', '_token' => $token]);
        $I->seeResponseCodeIs(200);
        $I->amOnPage('/en/account');
        $I->see('xxx yyy');
    }

    public function canChangePassword(FunctionalTester $I)
    {
        $I->wantTo('change user password');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Change password');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['nick' => 'JohnyD', 'email' => 'john@doe.com', 'password' => 'test124', 'password_confirmation' => 'test124', '_token' => $token]);
        $I->seeResponseCodeIs(200);
        $I->logout();
        $I->login('john@doe.com', 'test124');
    }

    public function canNotChangePasswordWithoutConfirmation(FunctionalTester $I)
    {
        $I->wantTo('change user password without confirmation');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Change password');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['nick' => 'JohnyD', 'email' => 'john@doe.com', 'password' => 'test124', '_token' => $token]);
        $I->seeResponseCodeIs(400);
    }

    public function canNotChangeNickToAlreadyTaken(FunctionalTester $I)
    {
        $I->haveRecord(
            'users',
            [
                'nick' => 'JohnyDoe',
                'first_name' => 'Johny',
                'last_name' => 'Doe',
                'email' => 'john@domain.com',
                'password' => bcrypt('test123'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        );

        $I->wantTo('change user nick to already taken');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Nick name');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['nick' => 'JohnyDoe', 'email' => 'john@doe.com',  '_token' => $token]);
        $I->seeResponseCodeIs(400);
        $I->canSee('The nick name has already been taken.');
    }

    public function canNotChangeEmailToAlreadyTaken(FunctionalTester $I)
    {
        $I->haveRecord(
            'users',
            [
                'nick' => 'JohnyDoe',
                'first_name' => 'Johny',
                'last_name' => 'Doe',
                'email' => 'john@domain.com',
                'password' => bcrypt('test123'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]
        );

        $I->wantTo('change user email to already taken');
        $I->login('john@doe.com', 'test123');
        $I->click('Edit Account', '.user-nav');
        $I->canSee('Nick name');
        $token = $I->grabValueFrom("input[name='_token']");
        $loggedUser = $I->grabRecord('users', ['email' => 'john@doe.com']);
        $I->sendAjaxRequest('PUT', '/en/api/v1/account/' . $loggedUser->id, ['email' => 'john@domain.com', '_token' => $token]);
        $I->seeResponseCodeIs(400);
        $I->canSee('The email has already been taken.');
    }

}

