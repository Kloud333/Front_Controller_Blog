<?php


class UserCabinetPageCest {
    public function _before(AcceptanceTester $I) {
        $I->amOnPage('/registration');
        $I->submitForm('.registration-form', ['username' => 'test', 'email' => 'test@mail.com', 'password' => 'test']);
        $I->amOnPage('/login');
        $I->submitForm('.login-form', ['username' => 'admin', 'password' => 'admin']);
        $I->amOnPage('/user/cabinet/');
        $I->submitForm('.add-post-form', ['addPostTitle' => 'p', 'addPostText' => 'p']);

    }

    public function _after(AcceptanceTester $I) {
    }

    // tests
    public function successfulAddPost(AcceptanceTester $I) {
        $I->wantTo('Successful adding post');
        $I->submitForm('.add-post-form', ['addPostTitle' => 'p', 'addPostText' => 'p']);
        $I->see('Post added!');
    }

    public function unsuccessfulAddPostEmptyFields(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful adding post - Empty fields');
        $I->submitForm('.add-post-form', ['addPostTitle' => '', 'addPostText' => '']);
        $I->see('Fill all fields!');
    }

    public function unsuccessfulAddPostEmptyTitle(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful adding post - Empty Title');
        $I->submitForm('.add-post-form', ['addPostTitle' => '', 'addPostText' => 'text']);
        $I->see('Fill all fields!');
    }

    public function unsuccessfulAddPostEmptyText(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful adding post - Empty Text of post');
        $I->submitForm('.add-post-form', ['addPostTitle' => 'title', 'addPostText' => '']);
        $I->see('Fill all fields!');
    }

    public function successfulDeletePost(AcceptanceTester $I) {
        $I->wantTo('Successful deleting post');
        $I->click('delete');
        $I->see('Post deleted!');
    }

    public function successfulEditPost(AcceptanceTester $I) {
        $I->wantTo('Successful editing post');
        $I->click('edit');
        $I->submitForm('.edit-post-form', ['addPostTitle' => 'a', 'addPostText' => 'a']);
        $I->see('Post changed!');
    }

    public function unsuccessfulEditPost(AcceptanceTester $I) {
        $I->wantTo('Unsuccessful editing post');
        $I->click('edit');
        $I->submitForm('.edit-post-form', ['addPostTitle' => '', 'addPostText' => '']);
        $I->see('Fields cannot be empty!');
    }
}
