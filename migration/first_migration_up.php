<?php
include '../app/app.php';

use Illuminate\Database\Capsule\Manager as Capsule;


Capsule::schema()->create('widgets', function (Illuminate\Database\Schema\Blueprint $table) {
    // Auto-increment id
    $table->increments('id');
    $table->integer('serial_number');
    $table->string('name');
    $table->timestamps();
});

