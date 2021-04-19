<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // $mesas  = Mesa::paginate(10);

		return View('Reportes.dashboard');
    }
}
