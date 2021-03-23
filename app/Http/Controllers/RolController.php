<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    $roles  = Rol::paginate(10);

    return View('Rol.index', compact(['roles']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('Rol.create');

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
            'RolNombre' => 'required'
        ]);

        $rol = new Rol();
		$rol->RolNombre = $request->input('RolNombre');
		$rol->save();

        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show(Rol $rol)
    {
        //
        return View('Rol.show', compact('rol'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function edit(Rol $rol)
    {
        //
        return View('Rol.edit', compact('rol'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        //
        $validate = $request->validate([
            'RolNombre' => 'required'
        ]);

		$rol->RolNombre = $request->input('RolNombre');
		$rol->save();

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rol $rol)
    {
        //
        $rol->delete();

        return redirect()->route('roles.index');
    }
}
