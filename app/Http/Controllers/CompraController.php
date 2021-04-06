<?php

namespace App\Http\Controllers;

use App\Compra;
use Illuminate\Http\Request;
use App\Producto;
use App\Proveedor;

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
        return $request;

        $validate = $request->validate([
        'proveedor' => 'exists:proveedores,ProveedorId'
        ],
        [
            'proveedor.exists' => 'proveedor no existe...',
        ]);

        $compra = new Compra();
        $compra->CompraStatus = 'Abierta';
        $compra->CompraSaldo = 0;
        $compra->CompraTotal = 0;
        
        $compra->fk_user = Auth::id();
        $compra->fk_proveedor = $request->input('proveedor');
        $compra->save();
        
        $productosdelacompra = $request->input('fk_producto');
        $compraCantidad  = $request->input('compraCantidads');

        $total = 0;
        $saldo = 0;
        foreach ($productosdelacompra as $key => $id) {
            // $compraCantidad[$key] * 

            $producto = Producto::find($id);
            $producto->ProductoCantidad = $producto->ProductoCantidad + $compraCantidad[$key];
            $producto->save();

            $total = $total + $producto->ProductoCantidad * $compraCantidad[$key];
            $saldo = $total;
        }

        $compra->CompraSaldo = 0;
        $compra->CompraTotal = 0;
        
        $compra->fk_user = Auth::id();
        $compra->fk_proveedor = $request->input('proveedor');
        $compra->save();

        $compra->productos->attach($request->input('fk_producto'));

        return redirect()->route('compras.index');
    
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

		return View('Compra.show', compact(['venta', 'productos']));
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
