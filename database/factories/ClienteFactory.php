<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
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

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'ClienteNombre' => $faker->firstName.' '.$faker->lastName,
        'ClienteDocumento' => $faker->numberBetween($min = 950000000, $max = 1200000000),
    ];
});
