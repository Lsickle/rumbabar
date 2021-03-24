<?php

namespace App\Http\Controllers;

use App\Proveedor;
use App\Rol;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $proveedores = Proveedor::all('ProveedorID');
        // $roles = Rol::all('RolId');

        // return $roles->random()->RolId;
        $proveedores  = Proveedor::paginate(10);

		return View('Proveedor.index', compact(['proveedores']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Proveedor.create');

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
        $validate = $request->validate([
            'ProveedorNombre' => 'required|string|max:255',
            'ProveedorNit' => 'required'
        ]);

        $proveedor = new PRoveedor();
		$proveedor->ProveedorNombre = $request->input('ProveedorNombre');
		$proveedor->ProveedorNit = $request->input('ProveedorNit');
		$proveedor->save();

        return redirect()->route('proveedors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //
        return View('Proveedor.show', compact('proveedor'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedor $proveedor)
    {
        //
        return View('Proveedor.edit', compact('proveedor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $validate = $request->validate([
            'ProveedorNombre' => 'required|string|max:255',
            'ProveedorNit' => 'required'
        ]);
		$proveedor->ProveedorNombre = $request->input('ProveedorNombre');
		$proveedor->ProveedorNit = $request->input('ProveedorNit');
		$proveedor->save();

        return redirect()->route('proveedors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proveedor $proveedor)
    {
        //
        $proveedor->delete();

        return redirect()->route('proveedors.index');
    }
}
