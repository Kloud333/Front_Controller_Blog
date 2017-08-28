<?php

namespace app\src\controllers\users;


use function app\core\renderView;
use app\core;
use app\src\models\User;

/**
 * @return null|string
 */
function loginPage() {
    return renderView(['default_template.php', 'users/login.php']);
}

function registrationPage() {
    return renderView(['default_template.php', 'users/registration.php']);
}

function login() {

    if (!($_POST['username']) || !($_POST['password'])) {
        core\addFlash('danger', 'Not enough parameters');
        core\redirect('login_page');
    }

    if (!($user = loadUserByUsername($_POST['username']))) {
        core\addFlash('danger', 'Username or password are incorrect');
        core\redirect('login_page');
    }

    if (!password_verify((string)$_POST['password'], $user['password'])) {
        core\addFlash('danger', 'Username or password are incorrect');
        core\redirect('login_page');
    }

    core\persistUser($user);

    core\addFlash('success', 'You are successfully logged!');

    core\redirect('main_page');
}

function logout() {
    core\clearUser();
    core\redirect('main_page');
}

function loadUserByUsername($username) {
    $users = User::where('username', '=', $username)->get()->toArray();
    return current($users);
}

function registration() {
    $user = User::where('username', '=', $_POST['username'])->get()->toArray();

    if (!($_POST['username']) || !($_POST['email']) || (!$_POST['password'])) {
        core\addFlash('danger', 'Not enough parameters');
        core\redirect('registration_page');
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        core\addFlash('danger', 'Incorrect email');
        core\redirect('registration_page');
    }

    if (!($_POST['username'] == $user[0]['username'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        User::insert(['username' => $_POST['username'], 'password' => $password, 'email' => $_POST['email']]);

        core\addFlash('success', 'You are register!');
        core\redirect('main_page');
    } else {
        core\addFlash('danger', 'Username already exists!');
        core\redirect('registration_page');
    }


}