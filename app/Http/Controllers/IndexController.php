<?php

namespace App\Http\Controllers;

use App\Index;
use Illuminate\Support\Facades\DB;
use App\Clientes;
use App\Proveedores;
use App\Propietarios;
use App\Envase_remision;
use App\Remisiones;
use App\Envases;
use App\Empleados;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $envases= Envases::count();
        $remisiones= Remisiones::count();
        $gases= Envases::where('Id_propietario','=','807004688-2')->count();
        $porllenar= Envases::where('Estado_actual','=','0')->where('Inventario','=','1')->count();
        $masdemes=Envase_remision::where('Estado', '=', '1')
  ->where('created_at', '<=', Carbon::now()->subDays(30)->toDateTimeString())
  ->get();
  $masdemesnumero=Envase_remision::where('Estado', '=', '1')
  ->where('created_at', '<=', Carbon::now()->subDays(30)->toDateTimeString())
  ->count();


        $datos2= Envase_remision::with('remision','remision.cliente')->where('Estado','=','1')->get();
        Carbon::setLocale('es');
        $dt = Carbon::parse($request->ShootDateTime)->timezone('America/Bogota');

        return view('index.index', compact('gases','porllenar','remisiones','envases','datos2','masdemesnumero','masdemes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Index $index)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function edit(Index $index)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Index $index)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Index  $index
     * @return \Illuminate\Http\Response
     */
    public function destroy(Index $index)
    {
        //
    }
}
