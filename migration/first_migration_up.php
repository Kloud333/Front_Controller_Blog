<?php
include '../app/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function (Illuminate\Database\Schema\Blueprint $table) {
    $table->increments('id')->unsigned();
    $table->string('username')->unique()->charset('utf8');
    $table->string('password')->charset('utf8');
    $table->string('email')->charset('utf8');
});

Capsule::schema()->create('posts', function (Illuminate\Database\Schema\Blueprint $table) {
    $table->increments('id');
    $table->string('title')->charset('utf8');
    $table->dateTime('created_at')->default(Capsule::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
    $table->text('content')->charset('utf8');
    $table->integer('user_id')->unsigned();
    $table->foreign('user_id')->references('id')->on('users');
});



//Capsule::schema()->table('widgets', function (Illuminate\Database\Schema\Blueprint $table) {
//    $table->string('user_id');
//
//});


