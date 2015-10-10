<?php
$I = new FunctionalTester($scenario);
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
