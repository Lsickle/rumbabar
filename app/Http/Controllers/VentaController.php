<?php

namespace App\Http\Controllers;

use App\Venta;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
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
        // return $request;

        $validate = $request->validate([
        'fk_cliente' => 'exists:clientes,ClienteId',
        'fk_mesa' => 'exists:mesas,MesaId'
        ],
        [
            'fk_cliente.exists' => 'cliente no existe...',
            'fk_mesa.exists' => 'mesa no existe...',
        ]);

        $venta = new Venta();
        $venta->VentaStatus = 'Abierta';
        $venta->VentaSaldo = 0;
        $venta->VentaTotal = 0;

        $venta->fk_user = Auth::id();
        $venta->fk_cliente = $request->input('fk_cliente');
        $venta->fk_mesa = $request->input('fk_mesa');
        $venta->save();

        $productosdelacompra = $request->input('fk_producto');
        $ventaCantidad  = $request->input('compraCantidad');

        $total = 0;
        $saldo = 0;
        // return $ventaCantidad;

        foreach ($productosdelacompra as $key => $id) {

            $producto = Producto::find($id);
            $producto->ProductoCantidad = $producto->ProductoCantidad + $ventaCantidad[$key];
            $producto->save();

            $subtotal = $producto->ProductoPrecio * $ventaCantidad[$key];
            $total  = $total + $subtotal;

			$venta->productos()->attach($producto->ProductoId, ['ventaCantidad' => $ventaCantidad[$key], 'ventaSubtotal' => $subtotal]);
        }

        $venta->VentaSaldo = $total;
        $venta->VentaTotal = $total;
        $venta->save();

        return redirect()->route('ventas.show', ['venta' => $venta]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
		return View('Venta.show', compact(['venta']));
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
