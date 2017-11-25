<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});
/**
 * Factory definition for model App\DeveloperApp.
 */
$factory->define(App\DeveloperApp::class, function ($faker) {
    return [
        'developer_id' => $faker->key,
    ];
});

/**
 * Factory definition for model App\Developer.
 */
$factory->define(App\Developer::class, function ($faker) {
    return [
        // Fields here
    ];
});

/**
 * Factory definition for model App\Company.
 */
$factory->define(App\Company::class, function ($faker) {
    return [
        // Fields here
    ];
});

/**
 * Factory definition for model App\Client.
 */
$factory->define(App\Client::class, function ($faker) {
    return [
        'team_id' => $faker->key,
    ];
});
