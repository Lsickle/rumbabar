<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;
use Illuminate\Support\Facades\Auth;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$compras = Compra::with(['productos.proveedor', 'comprador'])->get();
		$comprasgeneral = Compra::with(['productos.proveedor', 'comprador'])->get();
		$totalgeneral = 0;

		foreach ($comprasgeneral as $key => $compra) {
			foreach ($compra->productos as $key => $producto) {
				$totalgeneral = $totalgeneral + ($producto->ProductoPrecio * $producto->pivot->compraCantidad);
			}
		}

		return View('Compra.index', compact(['compras', 'totalgeneral']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
		$proveedores = Proveedor::all();


		return View('Compra.create', compact(['productos', 'proveedores']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $validate = $request->validate([
        'fk_proveedor' => 'exists:proveedores,ProveedorId'
        ],
        [
            'fk_proveedor.exists' => 'proveedor no existe...',
        ]);

        $compra = new Compra();
        $compra->CompraStatus = 'Abierta';
        $compra->CompraSaldo = 0;
        $compra->CompraTotal = 0;

        $compra->fk_user = Auth::id();
        $compra->fk_proveedor = $request->input('fk_proveedor');
        $compra->save();

        $productosdelacompra = $request->input('fk_producto');
        $compraCantidad  = $request->input('compraCantidad');

        $total = 0;
        $saldo = 0;
        // return $compraCantidad;

        foreach ($productosdelacompra as $key => $id) {

            $producto = Producto::find($id);
            $producto->ProductoCantidad = $producto->ProductoCantidad + $compraCantidad[$key];
            $producto->save();

            $subtotal = $producto->ProductoPrecio * $compraCantidad[$key];
            $total  = $total + $subtotal;

			$compra->productos()->attach($producto->ProductoId, ['compraCantidad' => $compraCantidad[$key], 'compraSubtotal' => $subtotal]);
        }

        $compra->CompraSaldo = $total;
        $compra->CompraTotal = $total;
        $compra->save();

        return redirect()->route('compras.show', ['compra' => $compra]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
		// return $compra->proveedor;
		return View('Compra.show', compact(['compra']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compra $compra)
    {
        $compra->delete();

        return redirect()->route('compras.index');
    }
}
