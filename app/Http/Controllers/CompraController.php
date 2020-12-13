<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$compras = Compra::with(['productos.proveedor', 'comprador'])->paginate(10);
		$comprasgeneral = Compra::with(['productos.proveedor', 'comprador'])->get();
		$totalgeneral = 0;

		foreach ($comprasgeneral as $key => $compra) {
			foreach ($compra->productos as $key => $producto) {
				$totalgeneral = $totalgeneral + ($producto->ProductoPrecio * $producto->pivot->compraCantidad);
			}
		}

		return View('compras', compact(['compras', 'totalgeneral']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
		$productos = $compra->productos()->paginate(10);

		return View('nuevacompra', compact(['venta', 'productos']));
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
        //
    }
}
