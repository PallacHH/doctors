<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'surname' => $faker->word,
        'name' => $faker->word,
        'second_name' => $faker->word,
        'birthday' => $faker->date(),
        'education' => $faker->paragraph,
        'certificates' => $faker->paragraph,
        'city_id' => function () {
            return factory(\App\City::class)->create()->id;
        }
    ];
});