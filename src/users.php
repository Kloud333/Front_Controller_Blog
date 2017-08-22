<?php

namespace app\src\users;


use function app\core\renderView;
use app\core;

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
    global $app;

    /** @var \PDO $dbh */
    $dbh = $app['db'];

    $sth = $dbh->prepare('SELECT * FROM users WHERE username=?');
    $sth->execute([$_POST['username']]);
    $users = $sth->fetchAll(\PDO::FETCH_ASSOC);

    return current($users);
}

function registration() {

    global $app;

    /** @var \PDO $dbh */
    $dbh = $app['db'];
    $sth = $dbh->prepare('SELECT username FROM users WHERE username=?');
    $sth->execute([$_POST['username']]);
    $user = $sth->fetchAll(\PDO::FETCH_ASSOC);

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
        $sth = $dbh->prepare('INSERT INTO blog.users ( username, password, email) VALUES ( ?, ?, ? )');
        $sth->execute([$_POST['username'], $password, $_POST['email']]);
        core\addFlash('success', 'You are register!');
        core\redirect('main_page');
    } else {
        core\addFlash('danger', 'Username already exists!');
        core\redirect('registration_page');
    }


}