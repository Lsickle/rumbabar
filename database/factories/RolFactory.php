<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rol;
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

$factory->define(Rol::class, function (Faker $faker) {
    return [
        'RolNombre' => $faker->randomElement($array = array ('administrador','vendedor')),
    ];
});
