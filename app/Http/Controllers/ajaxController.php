<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Venta;
use App\Compra;
use App\Proveedor;
use Illuminate\Support\Facades\Storage;



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
			$urlImage = Storage::url($producto->ProductoImage);

			$Response['newtoken'] = csrf_token();
			$Response['producto'] = $producto;
			$Response['urlImage'] = $urlImage;
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

			// chequear si la pivot existe


			$venta->productos()->updateExistingPivot($producto->ProductoId, ['ventaCantidad' => $request->input('ventaCantidad'), 'ventaSubtotal' => $request->input('ventaCantidad') * $producto->ProductoPrecio ]);

			$producto->CantidadVendida = $request->input('ventaCantidad');
			$producto->subtotal = number_format(($producto->ProductoPrecio * $producto->CantidadVendida), 2, '.', ',');
			$producto->precio = number_format($producto->ProductoPrecio, 2, '.', ',');

			$Response['newtoken'] = csrf_token();
			$Response['producto'] = $producto;
			$Response['message'] = 'producto agregado a la venta';

			return response()->json($Response);

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Producto  $producto
	 * @return \Illuminate\Http\Response
	 */
	public function filterProducts(Request $request)
	{
		if ($request->ajax()) {
			session()->regenerate();
			$validate = $request->validate([
                'proveedor' => 'exists:proveedores,ProveedorId'
            ],
            [
                'proveedor.exists' => 'proveedor no existe...',
            ]);

			$proveedor = Proveedor::where('ProveedorId', $request->input('proveedor'))->first();

			$productos = Producto::where('fk_proveedor', $proveedor->ProveedorId)->get();

			$Response['newtoken'] = csrf_token();
			$Response['proveedor'] = $proveedor;
			$Response['productos'] = $productos;
			if ($productos->count()>0) {
				$Response['message'] = 'productos encontrados';
			}else{
				$Response['message'] = 'este proveedor no posee productos';
			}

			return response()->json($Response);

		}
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Producto  $producto
	 * @return \Illuminate\Http\Response
	 */
	public function addProductCompra(Request $request, Compra $compra)
	{
		if ($request->ajax()) {
			session()->regenerate();

			$validate = $request->validate([
                'compra' => 'exists:compras,CompraId'
            ],
            [
                'compra.exists' => 'número de compra no existe...',
            ]);

			$productToUpdate = Producto::find($request->input('id'));
			$productToUpdate->ProductoCantidad = $productToUpdate->ProductoCantidad + $request->input('compraCantidad');
			$productToUpdate->save();

			$pivotToUpdate = "";
			$pivotcantidad = 0;
			$pivotsubtotal = 0;

			foreach ($compra->productos as $producto) {
				if ($request->input('id') == $producto->ProductoId) {
					$pivotToUpdate = $producto->ProductoId;
					$pivotcantidad = $producto->pivot->compraCantidad + $request->input('compraCantidad');
					$pivotsubtotal = $producto->pivot->compraSubtotal + ($request->input('compraCantidad')*$productToUpdate->ProductoPrecio);
				}
			}

			if ($pivotToUpdate == "") {
				$compra->productos()->attach($productToUpdate->ProductoId, [
					'compraCantidad' => $request->input('compraCantidad'),
					'compraSubtotal' => $request->input('compraCantidad')*$productToUpdate->ProductoPrecio
				]);
				$pivotcantidad = $request->input('compraCantidad');
				$pivotsubtotal = $request->input('compraCantidad')*$productToUpdate->ProductoPrecio;
			}else{
				$compra->productos()->updateExistingPivot($pivotToUpdate, [
					'compraCantidad' => $pivotcantidad,
					'compraSubtotal' => $pivotsubtotal
				]);
			}

			// $producto->subtotal = number_format(($producto->ProductoPrecio * $producto->CantidadVendida), 2, '.', ',');
			// $producto->precio = number_format($producto->ProductoPrecio, 2, '.', ',');
			$productToUpdate->CantidadComprada = $pivotcantidad;
			$productToUpdate->subtotal = $pivotsubtotal;
			$Response['newtoken'] = csrf_token();
			$Response['producto'] = $productToUpdate;
			$Response['message'] = 'producto agregado a la compra';

			return response()->json($Response);

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Producto  $producto
	 * @return \Illuminate\Http\Response
	 */
	public function dropProductCompra(Request $request, Compra $compra)
	{
		if ($request->ajax()) {
			session()->regenerate();

			$validate = $request->validate([
                'compra' => 'exists:compras,CompraId'
            ],
            [
                'compra.exists' => 'número de compra no existe...',
            ]);

			if ($request->input('compraCantidad') < 0) {
				$valor = 0 - $request->input('compraCantidad');
			}else{
				$valor = $request->input('compraCantidad');
			}

			$productToUpdate = Producto::find($request->input('id'));
			if (($productToUpdate->ProductoCantidad - $valor) < 0) {
				$productToUpdate->ProductoCantidad = 0;
			}else{
				$productToUpdate->ProductoCantidad = $productToUpdate->ProductoCantidad - $valor;
			}
			$productToUpdate->save();

			$pivotToUpdate = "";
			$pivotcantidad = 0;
			$pivotsubtotal = 0;

			foreach ($compra->productos as $producto) {
				if ($request->input('id') == $producto->ProductoId) {
					$pivotToUpdate = $producto->ProductoId;
					$pivotcantidad = $producto->pivot->compraCantidad - $valor;
					$pivotsubtotal = $producto->pivot->compraSubtotal - ($valor*$productToUpdate->ProductoPrecio);
				}
			}

			if ($pivotcantidad <= 0) {
				$compra->productos()->detach($productToUpdate->ProductoId);
				$pivotcantidad = 0;
				$pivotsubtotal = 0;
			}else{
				$compra->productos()->updateExistingPivot($pivotToUpdate, [
					'compraCantidad' => $pivotcantidad,
					'compraSubtotal' => $pivotsubtotal
				]);
			}

			// $producto->subtotal = number_format(($producto->ProductoPrecio * $producto->CantidadVendida), 2, '.', ',');
			// $producto->precio = number_format($producto->ProductoPrecio, 2, '.', ',');
			$productToUpdate->CantidadComprada = $pivotcantidad;
			$productToUpdate->subtotal = $pivotsubtotal;
			$Response['newtoken'] = csrf_token();
			$Response['producto'] = $productToUpdate;
			$Response['message'] = 'producto restado a la compra';

			return response()->json($Response);

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Producto  $producto
	 * @return \Illuminate\Http\Response
	 */
	public function dropProductVenta(Request $request, Venta $venta)
	{
		if ($request->ajax()) {
			session()->regenerate();

			$validate = $request->validate([
                'venta' => 'exists:ventas,VentaId'
            ],
            [
                'venta.exists' => 'número de venta no existe...',
            ]);
			
			if ($request->input('ventaCantidad') < 0) {
				$valor = 0 - $request->input('ventaCantidad');
			}else{
				$valor = $request->input('ventaCantidad');
			}

		
			$productToUpdate = Producto::find($request->input('id'));

			if (($productToUpdate->ProductoCantidad - $valor) < 0) {
				$productToUpdate->ProductoCantidad = 0;
			}else{
				$productToUpdate->ProductoCantidad = $productToUpdate->ProductoCantidad - $valor;
			}
			$productToUpdate->save();

			$pivotToUpdate = "";
			$pivotcantidad = 0;
			$pivotsubtotal = 0;

			foreach ($venta->productos as $producto) {
				if ($request->input('id') == $producto->ProductoId) {
					$pivotToUpdate = $producto->ProductoId;
					$pivotcantidad = $producto->pivot->ventaCantidad - $valor;
					$pivotsubtotal = $producto->pivot->ventaSubtotal - ($valor*$productToUpdate->ProductoPrecio);
				}
			}

			if ($pivotcantidad < 0) {
				$venta->productos()->detach($productToUpdate->ProductoId);
				$pivotcantidad = 0;
				$pivotsubtotal = 0;
			}else{
				$venta->productos()->updateExistingPivot($pivotToUpdate, [
					'ventaCantidad' => $pivotcantidad,
					'ventaSubtotal' => $pivotsubtotal
				]);
			}

			// $producto->subtotal = number_format(($producto->ProductoPrecio * $producto->CantidadVendida), 2, '.', ',');
			// $producto->precio = number_format($producto->ProductoPrecio, 2, '.', ',');
			$productToUpdate->CantidadRestada = $pivotcantidad;
			$productToUpdate->subtotal = $pivotsubtotal;
			$Response['newtoken'] = csrf_token();
			$Response['producto'] = $productToUpdate;
			$Response['message'] = 'producto restado a la venta';

			return response()->json($Response);

		}
	}
}
