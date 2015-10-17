<?php
use \FunctionalTester;

class LoginCest {

    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function register(FunctionalTester $I)
    {
        $I->wantTo('register a user');

        $I->amOnPage('/en/register');
        $I->fillField('firstName', 'John');
        $I->fillField('lastName', 'Doe');
        $I->fillField('email', 'example@example.com');
        $I->fillField('password', 'password');
        $I->click('button[type=submit]');

        $I->amOnPage('/');
        $I->seeRecord('Users', ['email' => 'example@example.com']);
        $I->seeAuthentication();
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
