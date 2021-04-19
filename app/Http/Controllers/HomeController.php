<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use App\Venta;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$ultimaventa = Venta::all()->last();
        $totalventaslastmonth = Venta::whereDate('updated_at', '>', Carbon::now()->subDays(30))->get('VentaTotal')->sum('VentaTotal');
        $numeroventaslastmonth = Venta::whereDate('updated_at', '>', Carbon::now()->subDays(30))->get()->count();

		$ultimacompra = Compra::all()->last();
        $totalcompraslastmonth = Compra::whereDate('updated_at', '>', Carbon::now()->subDays(30))->get('CompraTotal')->sum('CompraTotal');
        $numerocompraslastmonth = Compra::whereDate('updated_at', '>', Carbon::now()->subDays(30))->get()->count();

        // return $numerocompraslastmonth;
        return view('home', compact(['ultimaventa', 'ultimacompra', 'totalventaslastmonth']));
    }
}
