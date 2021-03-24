<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;
use App\Http\Requests\CreateclientesRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\ClientesImport;
use DataTables;

class ClientesController extends Controller
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

        if ($request->ajax()) {
  
            return Datatables::of(Clientes::all())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
            $btn = '<a type="button" class="editbutton btn btn-primary" href="/clientes/'.$data->Id_cliente.'/edit"><i class="fas fa-edit"></i></a>';
            $btn .= '&nbsp;';
            $btn .= '<button  class="deletebutton btn btn-danger"  data-toggle="modal" data-target="#deletemodal" data-info="'.$data->Id_cliente.';'.$data->Nom_cliente.'"><i class="fas fa-trash-alt"></i></button>';
          
         
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
        return view('clientes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateclientesRequest $request)
    {
     
        $datosCliente=request()->all();

        $datosCliente=request()->except('_token');
       

        Clientes::insert($datosCliente);

        $tipo = "alert alert-success";

 
     
       // Session::flash('flash_message','Guardado con exito');
        return redirect('clientes')->with('alert', 'Registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_cliente)
    {
          $cliente=Clientes::findOrFail($Id_cliente);

        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_cliente)
    {
      $datosCliente=request()->except(['_token','_method']);
       Clientes::where('Id_cliente','=',$Id_cliente)->update($datosCliente);
        
        return redirect('clientes')->with('Mensaje','Cliente Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_cliente)
    {
        
        // $cliente=Clientes::find($Id_cliente);
        // $cliente->delete();
        // return redirect('clientes')->with('Mensaje','Cliente eliminado');

        
    }
    public function deleteDate(Request $request)
    {
        $data=Clientes::find($request->Id_cliente)->delete();
        return response()->json();
    }
     public function exportpdf()
    {
        
        $clientespdf=Clientes::all();
        $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('clientes.pdf',compact('clientespdf'));
        return $pdf->stream('clientes-list.pdf');

    }
    public function importexcel(Request $request){
        $file=$request->file('file');
        Excel::import(new ClientesImport, $file);
        return back()->with('alert', 'Registrado con exito');

    }
}
