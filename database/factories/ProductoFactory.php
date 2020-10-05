<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use App\Proveedor;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing/seeding your application's database.
|
*/



$factory->define(Producto::class, function (Faker $faker) {
    $proveedor = Proveedor::all('ProveedorId');
    $lista = ['Espárragos', 'Salsa BBQ', 'Mantequilla', 'Margarina', 'Bagels', 'Croissants', 'Desodorante anti-transpirante', 'Ambientador', 'Brócoli', 'Salsa', 'Queso cottage', 'Bollos', 'Rollos', 'Jabón de baño', 'Jabón de manos', 'Limpiador de baños', 'Zanahorias', 'Miel', 'Mitad mitad', 'Pastel', 'Galletas', 'Condones', 'Otro b.c.', 'Blanqueador', 'Detergente', 'Coliflor', 'Salsa picante', 'Leche', 'Donuts', 'Pasteles', 'Productos cosméticos', 'Jabón para lavavajillas', 'lavavajillas', 'Apio', 'Mermelada', 'Gelatina', 'Conservas', 'Crema agria', 'Pan fresco', 'Hisopos', 'bolas de algodón', 'Bolsas de basura', 'Maíz', 'Ketchup', 'Mostaza', 'Crema batida', 'Tarta', 'Limpiador Facial', 'Limpiador de vidrio', 'Pepinos', 'Mayonesa', 'Yogur', 'Pan de pita', 'Pañuelo facial', 'Mop head', 'Vacuum bags', 'Lechuga', 'Verdes', 'Salsa para pasta', 'Pan rebanado', 'Productos femeninos', 'Esponjas', 'Depuradores', 'Hongos', 'Saborear', 'Seda floja', 'Cebollas', 'Aderezo para ensaladas', 'Gel', 'spray para el cabello', 'Pimientos', 'Salsa', 'Queso', 'Bálsamo labial', 'Papas', 'Salsa de soja', 'Horneado de queso azul', 'Loción hidratante', 'Material de oficina', 'Espinacas', 'Salsa de bistec', 'Queso Cheddar', 'Polvo de hornear', 'Soda', 'Enjuague bucal', 'CDR', 'DVDR', 'Squash', 'Jarabe', 'Queso cottage', 'Migas de pan', 'Navajas', 'Crema de afeitar', 'Bloc de notas', 'sobres', 'Calabacín', 'Salsa Worcestershire', 'Queso crema', 'Mezcla de pastel', 'brownie', 'Shampoo Acondicionador', 'Cinta adhesiva', 'Tomates', 'Feta', 'Pastel', 'Decoraciones', 'Bloqueador solar', 'Papel de imprimir', 'Queso de cabra', 'Chispas de chocolate', 'Cacao', 'Papel higiénico', 'Bolígrafos', 'Lápices', 'Queso Mozzarella', 'Harina', 'Pasta dental', 'Sellos', 'Varios comestibles', 'Parmesano', 'Acortamiento', 'Vitaminas', 'Suplementos', 'Frutas frescas', 'Cubitos de caldo', 'Queso Provolone', 'Azúcar', 'Manzanas', 'Cereal', 'Ricotta', 'Sustituto de azúcar', 'Aguacates', 'Café', 'Filtros', 'Rebanadas de sándwich', 'Carcinógenos de levadura', 'Plátanos', 'Patatas instantáneas', 'Suizo', 'Medicamento', 'Arsénico', 'Bayas', 'Jugo de limón', 'lima', 'Alergia', 'Amianto', 'Cerezas', 'Macarrones con queso', 'Antibiótico', 'Cigarrillos', 'Pomelo', 'Snacks de aceite de oliva', 'Antidiarreico', 'Radionúclidos', 'Uvas', 'Comidas envasadas Carne', 'Caramelo', 'Chicle', 'Aspirina', 'Cloruro de vinilo', 'Kiwis', 'Mezcla de panqueques', 'gofres', 'Tocino', 'Salchicha', 'Galletas', 'Neutralizador de acidez', 'Limones', 'Limas', 'Pasta', 'Carne de vaca', 'Galletas', 'Curitas', 'Otras cosas médicas', 'Melón', 'Mantequilla de maní', 'Pollo', 'Fruta seca', 'Resfriado', 'Gripe', 'Sinusitis', 'Automotor', 'Nectarinas', 'Pepinillos', 'Carne molida', 'Pavo', 'Barras de granola', 'Mix', 'Analgésico', 'Baterías', 'Naranjas', 'Arroz', 'Jamón', 'Cerdo', 'Semillas de nuez', 'Recogida de recetas', 'Carbón', 'Propano', 'Melocotones', 'Té', 'Perritos calientes', 'Harina de avena', 'Flores', 'Tarjeta de felicitación', 'Peras', 'Aceite vegetal', 'Carne de almuerzo', 'Palomitas de maiz', 'Repelente de insectos', 'Ciruelas', 'Vinagre', 'Turquía', 'Patatas', 'Chips de maíz', 'Bombillas', 'Cocina de pretzels', 'Periódico revista', 'Papel de aluminio', 'Servilletas', 'Spray antiadherente', 'Bagels', 'Coba', 'Comidas temáticas de bagre', 'Toallas de papel', 'Chip dip', 'Frijoles horneados', 'Cangrejo', 'Noche de hamburguesas', 'Lista de tareas de envoltura de plástico', 'Huevos', 'Huevos falsos', 'Caldo', 'Langosta', 'Noche de chile', 'Bolsas para sándwich', 'congelador', 'Magdalenas inglesas', 'Fruta', 'Mejillones', 'Noche de pizza', 'Papel encerado', 'Zumo de frutas', 'Olivos', 'Ostras', 'Noche de espaguetis', 'Hummus', 'Carnes en conserva', 'Salmón', 'Noche de tacos', 'Panes listos para hornear', 'Atún', 'Pollo', 'Camarón', 'Comida para llevar deli', 'Tofu', 'Sopa', 'Chile', 'Tilapia', 'Otro', 'Tortillas', 'Tomates', 'Atún', 'Verduras', 'Cosas de bebe', 'Congelado', 'Comida para bebé', 'Desayunos Bebidas', 'Pañales', 'Burritos Especias y hierbas', 'Cerveza', 'Fórmula', 'Palitos de pescado', 'Albahaca', 'Club soda', 'Tonic', 'Loción', 'Patatas fritas', 'Tater tots', 'Pimienta negra', 'Champán', 'Baby wash', 'Helado', 'Sorbete', 'Cilantro', 'Ginebra', 'Toallitas', 'Jugo concentrado', 'Canela', 'Jugo', 'Pizza', 'Ajo', 'Mezcladores', 'Rollos de pizza', 'Jengibre', 'Vino tinto', 'Vino blanco', 'Paletas de hielo', 'Menta', 'Mascotas del ron', 'Cenas de TV', 'Orégano', 'Motivo', 'Comida', 'golosinas para gatos', 'Verduras', 'Pimenton', 'Gaseosa', 'Arena para gatos', 'Perejil', 'Bebidas deportivas', 'Comida para perros', 'golosinas', 'Pimiento rojo', 'Whisky', 'Tratamiento de pulgas', 'Sal', 'Vodka', 'Champú para mascotas'];
    return [
        'ProductoNombre' => $faker->unique()->randomElement($lista),
        'ProductoDescripcion' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'ProductoPrecio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
        'ProductoCantidad' => $faker->numberBetween($min = 0, $max = 999),
        'fk_proveedor' => $faker->randomElement($proveedor),
    ];
});
