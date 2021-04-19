<?php

namespace App\Http\Controllers;

use App\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos  = Permiso::paginate(10);

		return View('Permiso.index', compact(['permisos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Permiso.create');
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
            'PermisoNombre' => 'required|string|max:255'
        ]);

        $permiso = new Permiso();
		$permiso->PermisoNombre = $request->input('PermisoNombre');
		$permiso->save();

        return redirect()->route('permisos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function show(Permiso $permiso)
    {
        //
        return View('Permiso.show', compact('permiso'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function edit(Permiso $permiso)
    {
        //
        return View('Permiso.edit', compact('permiso'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permiso $permiso)
    {
        //
        $validate = $request->validate([
            'PermisoNombre' => 'required|string|max:255'
        ]);

		$permiso->PermisoNombre = $request->input('PermisoNombre');
		$permiso->save();

        return redirect()->route('permisos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permiso  $permiso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permiso $permiso)
    {
        //
        $permiso->delete();

        return redirect()->route('mesas.index');
    }
}
