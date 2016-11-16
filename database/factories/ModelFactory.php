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
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\FoamType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'density' => $faker->numberBetween(1,50)
    ];
});

$factory->define(App\Resource::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'quantity' => $faker->numberBetween(1,100)
    ];
});

$factory->define(App\Log::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->dateTimeThisYear($max = 'now') ,
        'data_type' => $faker->word,
        'object_id' => $faker->numberBetween(1,50),
        'quantity' => $faker->numberBetween(1,50),
        'percentage' => $faker->numberBetween(1,100)
    ];
});

$factory->define(App\WasteSilo::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'percentage' => $faker->numberBetween(1,100),
        'resource_id' => $faker->numberBetween(1,5)
    ];
});

$factory->define(App\PrimeSilo::class, function (Faker\Generator $faker) {
    return [
        'quantity' => $faker->numberBetween(1,50),
        'resource_id' => $faker->numberBetween(1,5)
    ];
});

$factory->define(App\Block::class, function (Faker\Generator $faker) {
    return [
        'quantity' => $faker->numberBetween(1,20),
        'length' => $faker->numberBetween(1,15),
        'foam_type_id' => function () {
            return factory(App\FoamType::class)->create()->id;
        }
    ];
});