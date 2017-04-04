<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

// User
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstName . ' ' . $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});

// Category
$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];
});

// Article
$factory->define(App\Article::class, function (Faker\Generator $faker) {

    return [
        'title' => rtrim($faker->sentence, '.'),
        'category_id' => \App\Category::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
        'body' => $faker->paragraph,
    ];
});

// Role
$factory->define(App\Role::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->word,
    ];
});