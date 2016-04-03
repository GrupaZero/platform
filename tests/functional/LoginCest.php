<?php namespace platform;

use DateTime;

class LoginCest {

    public function _before(FunctionalTester $I)
    {
        $I->logout();
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function register(FunctionalTester $I)
    {
        $I->wantTo('register a user');

        $I->amOnPage('/en/register');
        $I->fillField('nickName', 'NickName');
        $I->fillField('firstName', 'John');
        $I->fillField('lastName', 'Doe');
        $I->fillField('email', 'example@example.com');
        $I->fillField('password', 'password');
        $I->click('button[type=submit]');

        $I->amOnPage('/');
        $I->seeRecord('Users', ['email' => 'example@example.com']);
        $I->seeAuthentication();
    }

    public function registerAlreadyExistingUser(FunctionalTester $I)
    {
        $I->wantTo('prevent registration a user with already registered email');
        $I->haveRecord(
            'Users',
            [
                'nickName' => 'NickName',
                'firstName' => 'John',
                'lastName'  => 'Doe',
                'email'     => 'john@doe.com',
                'password'  => bcrypt('password'),
                'createdAt' => new DateTime(),
                'updatedAt' => new DateTime(),
            ]
        );

        $I->amOnPage('/en/register');
        $I->fillField('nickName', 'NickName');
        $I->fillField('firstName', 'John');
        $I->fillField('lastName', 'Doe');
        $I->fillField('email', 'john@doe.com');
        $I->fillField('password', 'password');
        $I->click('button[type=submit]');
        $I->see('The email has already been taken.');
        $I->see('The nick name has already been taken.');
        $I->dontSeeAuthentication();
    }

    public function preventSpamUserRegistrations(FunctionalTester $I)
    {
        $I->wantTo('prevent a spammer users registrations');

        $I->amOnPage('/en/register');
        $I->fillField('nickName', 'NickName');
        $I->fillField('firstName', 'John');
        $I->fillField('lastName', 'Doe');
        $I->fillField('email', 'example@example.com');
        $I->fillField('password', 'password');
        $I->fillField('accountIntent', 'randomstring');
        $I->click('button[type=submit]');

        $I->amOnPage('/en');
        $I->seeResponseCodeIs(200);
        $I->dontSeeAuthentication();
    }

    public function login(FunctionalTester $I)
    {
        $I->wantTo('login as a user');
        $I->haveRecord(
            'Users',
            [
                'firstName' => 'John',
                'lastName'  => 'Doe',
                'email'     => 'john@doe.com',
                'password'  => bcrypt('password'),
                'createdAt' => new DateTime(),
                'updatedAt' => new DateTime(),
            ]
        );
        $I->amOnPage('/en/login');
        $I->fillField('email', 'john@doe.com');
        $I->fillField('password', 'password');
        $I->click('button[type=submit]');
        $I->seeCurrentUrlEquals('/en');
        $I->amOnPage('/en');
        $I->seeAuthentication();
        $I->see('John Doe');

        // Trying to access admin panel
        $I->amOnPage('admin');
        $I->seePageNotFound();
    }

    public function loginNonExistingUser(FunctionalTester $I)
    {
        $I->wantTo('prevent login as a none existing usr');
        $I->amOnPage('/en/login');
        $I->fillField('email', 'john@doe.com');
        $I->fillField('password', 'password');
        $I->click('button[type=submit]');
        $I->see('The username or password is incorrect. Please try again.');
        $I->dontSeeAuthentication();
    }

    public function loginAsAdmin(FunctionalTester $I)
    {
        $I->wantTo('login as a admin');
        $I->loginAsAdmin();
        $I->seeAuthentication();
        $I->amOnPage('admin');
        $I->see('G-ZERO ADMIN');
    }

    public function logout(FunctionalTester $I)
    {
        $I->wantTo('logout as a user');
        $I->haveRecord(
            'Users',
            [
                'firstName' => 'John',
                'lastName'  => 'Doe',
                'email'     => 'john@doe.com',
                'password'  => bcrypt('password'),
                'createdAt' => new DateTime(),
                'updatedAt' => new DateTime(),
            ]
        );
        $I->login('john@doe.com', 'password');
        $I->logout();
        $I->dontSeeAuthentication();
    }
}
