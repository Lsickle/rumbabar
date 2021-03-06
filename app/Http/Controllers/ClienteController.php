<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes  = Cliente::paginate(10);

		return View('Cliente.index', compact(['clientes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'ClienteNombre' => 'required|string|max:255',
            'ClienteDocumento' => 'required|numeric|min:0',
            'ClienteTipoDoc' => 'in:CC,CE,TI,PP,OTRO'
        ]);

        $cliente = new Cliente();
		$cliente->ClienteNombre = $request->input('ClienteNombre');
		$cliente->ClienteDocumento = $request->input('ClienteDocumento');
		$cliente->ClienteTipoDoc = $request->input('ClienteTipoDoc');
		$cliente->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return View('Cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return View('Cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validate = $request->validate([
            'ClienteNombre' => 'required|string|max:255',
            'ClienteDocumento' => 'required|numeric|min:0',
            'ClienteTipoDoc' => 'in:CC,CE,TI,PP,OTRO'
        ]);

		$cliente->ClienteNombre = $request->input('ClienteNombre');
		$cliente->ClienteDocumento = $request->input('ClienteDocumento');
		$cliente->ClienteTipoDoc = $request->input('ClienteTipoDoc');
		$cliente->save();

        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            $cliente->delete();

            return redirect()->route('clientes.index');
        } else {
            abort(401, 'No Tiene permiso de eliminar clientes');
        }
    }
}
