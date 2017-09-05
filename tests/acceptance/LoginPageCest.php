<?php


class LoginPageCest {
    public function _before(AcceptanceTester $I) {
        $I->amOnPage('/login');
    }

    public function _after(AcceptanceTester $I) {
    }

    // tests
    public function successfulLogin(AcceptanceTester $I) {
        $I->wantTo('Successful login');
        $I->submitForm('.login-form', ['username' => 'admin', 'password' => 'admin']);
        $I->see('You are successfully login!');
    }

    public function unsuccessfulLoginWrongData(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful login with wrong data');
        $I->submitForm('.login-form', ['username' => 'something', 'password' => 'something']);
        $I->see('Username or password are incorrect');
    }

    public function unsuccessfulLoginEmptyFields(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful login - Empty fields');
        $I->submitForm('.login-form', ['username' => '', 'password' => '']);
        $I->see('Not enough parameters');
    }

    public function unsuccessfulLoginEmptyUsername(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful login - Empty username');
        $I->submitForm('.login-form', ['username' => '', 'password' => 'pass']);
        $I->see('Not enough parameters');
    }

    public function unsuccessfulLoginEmptyPassword(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful login - Empty password');
        $I->submitForm('.login-form', ['username' => 'user', 'password' => '']);
        $I->see('Not enough parameters');
    }
}
