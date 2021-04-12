<?php

namespace App\Http\Controllers;

use App\Usuario;
use App\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            $usuarios  = Usuario::paginate(10);
        } else {
            $usuarios  = Usuario::where('id', Auth::id())->paginate(10);
        }

		return View('Usuario.index', compact(['usuarios']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            $roles = Rol::all();

            return View('Usuario.create', compact(['roles']));
        } else {
            abort(401, 'No Tiene permiso de acceder a la creacion de Usuarios');
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
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $usuarios = new Usuario();
		$usuarios->name = $request->input('name');
		$usuarios->email = $request->input('email');
		$usuarios->password = Hash::make($request->input('password'));
		$usuarios->fk_rol = $request->input('fk_rol');
		$usuarios->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            $roles = Rol::all();
            return View('Usuario.show', compact(['usuario', 'roles']));
        } else {
            if ($usuario->id == Auth::id()) {
                $roles = Rol::all();
                return View('Usuario.show', compact(['usuario', 'roles']));
            }else{
                abort(401, 'No Tiene permiso de acceder a los detalles de este usuario');
            }
        }
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            $roles = Rol::all();
            return View('Usuario.edit', compact(['usuario', 'roles']));
        } else {
            if ($usuario->id == Auth::id()) {
                $roles = Rol::all();
                return View('Usuario.edit', compact(['usuario', 'roles']));
            }else{
                abort(401, 'No Tiene permiso de editar este usuario');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

		$usuarios->name = $request->input('name');
		$usuarios->email = $request->input('email');
		$usuarios->password = $request->input('password');
		$usuarios->fk_rol = $request->input('fk_rol');
		$usuarios->save();

        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        
        if ( Auth::user()->hasRole(['Programador', 'Administrador']) ) {
            $usuario->delete();

            return redirect()->route('usuarios.index');
        } else {
            if ($usuario->id == Auth::id()) {
                $usuario->delete();

                return redirect()->route('usuarios.index');
            }else{
                abort(401, 'No Tiene permiso de eliminar este usuario');
            }
        }
    }
}
