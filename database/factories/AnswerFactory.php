<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        //
        'body' => $faker->paragraph(rand(3, 7), true),
        'user_id' => App\User::pluck('id')->random(), // pluck function get all id user and we invoke method random for random id
        'vote_count' => rand(0, 5),
    ];
});