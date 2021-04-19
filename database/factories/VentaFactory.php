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
    $users = App\User::all('id');
    $mesas = App\Mesa::all('MesaId');
    $clientes = App\Cliente::all('ClienteId');
    $total = $faker->numberBetween($min = 0, $max = 99999);
    return [
        'VentaStatus' => ($faker->randomElement($array = array ('Abierta','Facturada','Pagada', 'Cancelada', 'Pendiente')) ),
        'VentaSaldo' => ($total/$faker->numberBetween($min = 1, $max = 10)),
        'VentaTotal' => $total,
        'fk_user' => $users->random(),
        'fk_mesa' => $mesas->random(),
        'fk_cliente' => $clientes->random(),
        'created_at' => $faker->dateTimeBetween('2021-01-15', '2021-02-01')->format('Y-m-d H:i:s'),
        'updated_at' => $faker->dateTimeBetween('2021-02-01', '2021-03-24')->format('Y-m-d H:i:s'),
    ];
});
