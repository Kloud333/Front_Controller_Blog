<?php
include '../app/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;

try {

    Capsule::schema()->drop('users');
    Capsule::schema()->drop('posts');

    //echo "\033[31m some colored text \033[0m some white text \n";

} catch (Exception $e) {

    //echo "\033[31m some colored text \033[0m some white text \n";

}