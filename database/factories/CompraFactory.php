<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Compra;
use App\Usuario;
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
$factory->define(Compra::class, function (Faker $faker) {
    $usuarios = Usuario::all('UsuarioId');
    $total = $faker->numberBetween($min = 0, $max = 99999);
    return [
        'CompraSaldo' => ($total/$faker->numberBetween($min = 1, $max = 10)),
        'CompraTotal' => $total,
        'fk_user' => $faker->randomElement($usuarios),
    ];
});
