<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mesa;
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

$factory->define(Mesa::class, function (Faker $faker) {
    $puestos = [2, 4, 6, 8];
    return [
        'MesaPuestos' => $faker->randomElement($puestos),
        'created_at' => $faker->dateTimeBetween('2020-08-15', '2020-09-01')->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTimeBetween('2020-09-01', '2020-10-07')->format('Y-m-d H:i:s'),
    ];
});
