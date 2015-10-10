<?php
$I = new FunctionalTester($scenario);
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
