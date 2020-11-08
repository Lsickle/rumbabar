<?php

use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Venta::class, 100)->create()->each(function ($compra){
            $faker = Faker\Factory::create();
            $productos = App\Producto::all();
            $numProductos = $faker->numberBetween($min = 2, $max = 10);
            // Seed the relation with random producto
            foreach ($productos->random($numProductos) as $key => $producto) {
                $cantidad = ($faker->numberBetween($min = 1, $max = $producto->ProductoCantidad));
                $subtotal = $cantidad*$producto->ProductoPrecio;
                $compra->productos()->attach($producto->ProductoId, ['ventaCantidad' => $cantidad, 'ventaSubtotal' => $subtotal]);
            }
        });
    }
}
