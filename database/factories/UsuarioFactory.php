<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuario;
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

$factory->define(Usuario::class, function (Faker $faker) {
    $roles = Rol::all('RolId');
    $nombre = $faker->userName;
    return [
        'UsuarioName' => $nombre,
        'UsuarioEmail' => $nombre.'@'.$faker->freeEmailDomain,
        'UsuarioPassword' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'fk_rol' => $faker->randomElement($roles),
        'created_at' => $faker->dateTimeBetween('2020-08-15', '2020-09-01')->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTimeBetween('2020-09-01', '2020-10-07')->format('Y-m-d H:i:s'),
    ];
});