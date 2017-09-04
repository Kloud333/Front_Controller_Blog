<?php


class UserCabinetPageCest {
    public function _before(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful adding post');
        $I->amOnPage('/login');
        $I->submitForm('.login-form', ['username' => 'admin', 'password' => 'admin']);
        $I->amOnPage('/user/cabinet/');
    }

    public function _after(AcceptanceTester $I) {
    }

    // tests
    public function unsuccessfulAddPostEmptyFields(AcceptanceTester $I) {
        $I->submitForm('.add-post-form', ['addPostTitle' => '', 'addPostText' => '']);
        $I->see('Fill all fields!');
    }

    public function successfulAddPost(AcceptanceTester $I) {
        $I->submitForm('.add-post-form', ['addPostTitle' => 'p', 'addPostText' => 'p']);
        $I->see('Post added!');
    }

    public function successfulDeletePost(AcceptanceTester $I) {
        $I->click('delete');
        $I->see('Post deleted!');
    }

    public function successfulEditPost(AcceptanceTester $I) {
        $I->click('edit');
        $I->amOnPage('/edit/post/');
        $I->submitForm('.edit-post-form', ['addPostTitle' => 'a', 'addPostText' => 'a']);
        $I->see('Post changed!');
    }

    public function unsuccessfulEditPost(AcceptanceTester $I) {
        $I->click('edit');
        $I->amOnPage('/edit/post/');
        $I->submitForm('.edit-post-form', ['addPostTitle' => '', 'addPostText' => '']);
        $I->see('Fields cannot be empty!');
    }
}
