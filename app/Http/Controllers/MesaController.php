<?php

namespace App\Http\Controllers;

use App\Mesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mesas  = Mesa::paginate(10);

		return View('Mesa.index', compact(['mesas']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            return View('Mesa.create');
        } else {
            abort(401, 'No Tiene permiso de crear Mesas');
        }
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
            'MesaPuestos' => 'required|numeric|min:0'
        ]);

        $mesa = new Mesa();
		$mesa->MesaPuestos = $request->input('MesaPuestos');
		$mesa->save();

        return redirect()->route('mesas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function show(Mesa $mesa)
    {
        return View('Mesa.show', compact('mesa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesa $mesa)
    {
        return View('Mesa.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesa $mesa)
    {
        $validate = $request->validate([
            'MesaPuestos' => 'required|numeric|min:0'
        ]);

		$mesa->MesaPuestos = $request->input('MesaPuestos');
		$mesa->save();

        return redirect()->route('mesas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mesa  $mesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesa $mesa)
    {
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            $mesa->delete();

            return redirect()->route('mesas.index');
        } else {
            abort(401, 'No Tiene permiso de eliminar clientes');
        }
    }
}
