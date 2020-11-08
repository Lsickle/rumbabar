<?php

use Illuminate\Database\Seeder;
use App\Producto;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Compra::class, 50)->create()->each(function ($compra){
            $faker = Faker\Factory::create();
            $productos = Producto::all();
            $numProductos = $faker->numberBetween($min = 2, $max = 10);
            // Seed the relation with random producto
            foreach ($productos->random($numProductos) as $key => $producto) {
                $cantidad = ($faker->numberBetween($min = 1, $max = $producto->ProductoCantidad));
                $subtotal = $cantidad*$producto->ProductoPrecio;
                $compra->productos()->attach($producto->ProductoId, ['compraCantidad' => $cantidad, 'compraSubtotal' => $subtotal]);
            }
        });
    }
}
