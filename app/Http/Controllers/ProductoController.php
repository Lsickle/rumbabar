<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos  = Producto::paginate(10);

		return View('Producto.index', compact(['productos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$proveedores = Proveedor::all();

		return View('Producto.create', compact(['proveedores']));
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
            'fk_proveedor' => 'required|numeric|exists:proveedores,ProveedorId',
            'ProductoNombre' => 'required|string|max:255',
            'ProductoCodigo' => 'required|numeric|min:0',
            'ProductoPrecio' => 'required|min:0',
            'ProductoImage' => 'required|file'
        ]);

		if ($request->hasFile('ProductoImage')&&$request->file('ProductoImage')->isValid()) {
			$path = $request->file('ProductoImage')->store('public/Products');
		}else{
			$path = 'img/photo-default.png';
		}

        $producto = new Producto();
		$producto->fk_proveedor = $request->input('fk_proveedor');
		$producto->ProductoNombre = $request->input('ProductoNombre');
		$producto->ProductoCodigo = $request->input('ProductoCodigo');
		$producto->ProductoPrecio = $request->input('ProductoPrecio');
		$producto->ProductoDescripcion = $request->input('ProductoDescripcion');
		$producto->ProductoCantidad = 0;
        $producto->ProductoImage = $path;
		$producto->save();

        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
        return View('Producto.show', compact('producto'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        return View('Producto.edit', compact('producto'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
		$validate = $request->validate([
            'fk_proveedor' => 'required|numeric|exists:proveedores,ProveedorId',
            'ProductoNombre' => 'required|string|max:255',
            'ProductoCodigo' => 'required|numeric|min:0',
            'ProductoPrecio' => 'required|min:0',
            'ProductoImage' => 'required|file'
        ]);

		if ($request->hasFile('ProductoImage')&&$request->file('ProductoImage')->isValid()) {
			$path = $request->file('ProductoImage')->store('public/Products');
		}else{
			$path = 'img/photo-default.png';
		}

		$producto->fk_proveedor = $request->input('fk_proveedor');
		$producto->ProductoNombre = $request->input('ProductoNombre');
		$producto->ProductoCodigo = $request->input('ProductoCodigo');
		$producto->ProductoPrecio = $request->input('ProductoPrecio');
		$producto->ProductoDescripcion = $request->input('ProductoDescripcion');
		$producto->ProductoCantidad = 0;
        $producto->ProductoImage = $path;
		$producto->save();

        return redirect()->route('productos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();

        return redirect()->route('productos.index');
    }
}
