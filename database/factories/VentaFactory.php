<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Venta;
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

$factory->define(Venta::class, function (Faker $faker) {
    $usuarios = App\Usuario::all('UsuarioId');
    $mesas = App\Mesa::all('MesaId');
    $clientes = App\Cliente::all('ClienteId');
    $total = $faker->numberBetween($min = 0, $max = 99999);
    return [
        'VentaSaldo' => ($total/$faker->numberBetween($min = 1, $max = 10)),
        'VentaTotal' => $total,
        'fk_user' => $usuarios->random(),
        'fk_mesa' => $mesas->random(),
        'fk_cliente' => $clientes->random(),
    ];
});
