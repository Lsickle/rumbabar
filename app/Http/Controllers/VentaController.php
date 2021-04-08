<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Producto;
use App\Proveedor;
use App\Mesa;
use App\Cliente;


class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$ventas = Venta::with(['cliente', 'productos'])->get();
		$ventasgeneral = Venta::with(['cliente', 'productos'])->get();
		$totalgeneral = 0;

		foreach ($ventasgeneral as $key => $venta) {
			foreach ($venta->productos as $key => $producto) {
				$totalgeneral = $totalgeneral + ($producto->ProductoPrecio * $producto->pivot->ventaCantidad);
			}
		}

		return View('Venta.index', compact(['ventas', 'totalgeneral']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $mesas = Mesa::all();
        $productos = Producto::with('proveedor')->get();

        $ultimaventa = Venta::all()->last();

		return View('Venta.create', compact(['productos', 'mesas', 'clientes', 'ultimaventa']));
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
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
		$productos = $venta->productos()->paginate(10);

		return View('Venta.show', compact(['venta', 'productos']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route('ventas.index');
    }
}
