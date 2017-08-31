<?php

include '../app/app.php';

use app\src\models\User;
use app\src\models\Post;

$faker = Faker\Factory::create();

for ($i = 1; $i < 10; $i++) {
    $user = new User();
    $user->username = $faker->userName();
    $user->password = password_hash('1111', PASSWORD_DEFAULT);
    $user->email = $faker->email();
    $user->save();
}

for ($i = 1; $i < 15; $i++) {
    $post = new Post();
    $post->title = $faker->word();
    $post->created_at = $faker->dateTime();
    $post->content = $faker->text(50);
    $post->user_id = $faker->numberBetween(1,User::count());
    $post->save();
}



