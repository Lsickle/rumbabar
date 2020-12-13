<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Venta;


class ajaxController extends Controller
{
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Producto  $producto
	 * @return \Illuminate\Http\Response
	 */
	public function getProduct(Request $request)
	{
		if ($request->ajax()) {
			session()->regenerate();

			$validate = $request->validate([
                'id' => 'exists:productos,ProductoId'
            ],
            [
                'id.exists' => 'número de producto no existe...',
            ]);

			$producto = Producto::find($request->input('id'));

			$Response['newtoken'] = csrf_token();
			$Response['producto'] = $producto;
			$Response['message'] = 'producto encontrado';

			return response()->json($Response);

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Producto  $producto
	 * @return \Illuminate\Http\Response
	 */
	public function addProductVenta(Request $request, $venta)
	{
		if ($request->ajax()) {
			session()->regenerate();

			$validate = $request->validate([
                'venta' => 'exists:ventas,VentaId'
            ],
            [
                'venta.exists' => 'número de venta no existe...',
            ]);

			$producto = Producto::find($request->input('id'));
			$producto->ProductoCantidad = $producto->ProductoCantidad - $request->input('ventaCantidad');
			$producto->save();

			$venta = Venta::find($venta);

			$venta->productos()->attach($producto->ProductoId, ['ventaCantidad' => $request->input('ventaCantidad'), 'ventaSubtotal' => $request->input('ventaCantidad') * $producto->ProductoPrecio ]);

			$producto->CantidadVendida = $request->input('ventaCantidad');
			$producto->subtotal = number_format(($producto->ProductoPrecio * $producto->CantidadVendida), 2, '.', ',');
			$producto->precio = number_format($producto->ProductoPrecio, 2, '.', ',');

			$Response['newtoken'] = csrf_token();
			$Response['producto'] = $producto;
			$Response['message'] = 'producto agregado a la venta';

			return response()->json($Response);

		}
	}
}
