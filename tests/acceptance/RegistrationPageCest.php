<?php


class RegistrationPageCest {
    public function _before(AcceptanceTester $I) {
        $I->amOnPage('/registration');
    }

    public function _after(AcceptanceTester $I) {
    }

    // tests
    public function successfulRegistration(AcceptanceTester $I) {
        $I->wantTo('Successful registration');
        $I->submitForm('.registration-form', ['username' => 'admin', 'email' => 'admin@mail.com', 'password' => 'admin']);
        $I->see('Username already exists!');
    }

    public function unsuccessfulRegistrationEmptyFields(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Empty fields');
        $I->submitForm('.registration-form', ['username' => '', 'email' => '', 'password' => '']);
        $I->see('Not enough parameters!');
    }
    public function unsuccessfulRegistrationEmptyUsername(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Empty username');
        $I->submitForm('.registration-form', ['username' => 'user', 'email' => '', 'password' => '']);
        $I->see('Not enough parameters!');
    }
    public function unsuccessfulRegistrationEmptyEmail(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Empty email');
        $I->submitForm('.registration-form', ['username' => '', 'email' => 'mail', 'password' => '']);
        $I->see('Not enough parameters!');
    }
    public function unsuccessfulRegistrationEmptyPassword(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Empty password');
        $I->submitForm('.registration-form', ['username' => '', 'email' => '', 'password' => 'pass']);
        $I->see('Not enough parameters!');
    }

    public function unsuccessfulRegistrationWrongEmail(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Wrong Email');
        $I->submitForm('.registration-form', ['username' => 'test', 'email' => 'test', 'password' => 'test']);
        $I->see('Incorrect Email!');
    }

    public function unsuccessfulRegistrationExistingUsername(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Existing Username');
        $I->submitForm('.registration-form', ['username' => 'user', 'email' => 'user@mail.com', 'password' => 'user']);
        $I->submitForm('.registration-form', ['username' => 'user', 'email' => 'user@mail.com', 'password' => 'user']);
        $I->see('Username already exists!');
    }
}


