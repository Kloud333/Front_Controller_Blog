<?php


class RegistrationPageCest {
    public function _before(AcceptanceTester $I) {
        $I->amOnPage('/registration');
    }

    public function _after(AcceptanceTester $I) {
    }

    // tests
    public function unsuccessfulRegistrationEmptyFields(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Empty fields');
        $I->submitForm('.registration-form', ['username' => '', 'email' => '', 'password' => '']);
        $I->see('Not enough parameters!');
    }

    public function unsuccessfulRegistrationWrongEmail(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Wrong Email');
        $I->submitForm('.registration-form', ['username' => 'test', 'email' => 'test', 'password' => 'test']);
        $I->see('Incorrect Email!');
    }

    public function unsuccessfulRegistrationExistingUsername(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful registration - Existing Username');
        $I->submitForm('.registration-form', ['username' => 'admin', 'email' => 'admin@mail.com', 'password' => 'admin']);
        $I->see('Username already exists!');
    }
}


