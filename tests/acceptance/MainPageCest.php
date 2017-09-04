<?php


class MainPageCest {
    public function _before(AcceptanceTester $I) {
        $I->amOnPage('/');
    }

    public function _after(AcceptanceTester $I) {
    }

    // tests
    public function unsuccessfulSearchEmptyField(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful search - Empty field');
        $I->submitForm('.search-form', ['search' => '']);
        $I->see('Fill the search field!');
    }

    public function successfulSearch(AcceptanceTester $I) {
        $I->wantTo('Successful search');
        $I->submitForm('.search-form', ['search' => 'a']);
        $I->see('a','h3');
    }


}
