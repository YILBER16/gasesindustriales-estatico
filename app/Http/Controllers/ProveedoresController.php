<?php

namespace App\Http\Controllers;

use App\Proveedores;
use Illuminate\Http\Request;
use App\Http\Requests\CreateproveedoresRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\ProveedoresImport;
use DataTables;

class ProveedoresController extends Controller
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
  
            return Datatables::of(Proveedores::all())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
            $btn = '<a type="button" class="editbutton btn btn-primary" href="/proveedores/'.$data->Id_proveedor.'/edit"><i class="fas fa-edit"></i></a>';
            $btn .= '&nbsp;';
            $btn .= '<button  class="deletebutton btn btn-danger"  data-toggle="modal" data-target="#deletemodal" data-info="'.$data->Id_proveedor.';'.$data->Nom_proveedor.'"><i class="fas fa-trash-alt"></i></button>';
          
         
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
                            }
        return view('proveedores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateproveedoresRequest $request)
    {
     
        $datosProveedor=request()->all();

        $datosProveedor=request()->except('_token');
       

       Proveedores::insert($datosProveedor);

       

     
       // Session::flash('flash_message','Guardado con exito');
        return redirect('proveedores')->with('alert', 'Registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_proveedor)
    {
          $proveedor=Proveedores::findOrFail($Id_proveedor);

        return view('proveedores.edit',compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_proveedor)
    {
      $datosProveedor=request()->except(['_token','_method']);
       Proveedores::where('Id_proveedor','=',$Id_proveedor)->update($datosProveedor);
        
        return redirect('proveedores')->with('alertedit', 'Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_proveedor)
    {
        // $proveedor=Proveedores::find($Id_proveedor);
        // $proveedor->delete();
        // return redirect('proveedores')->with('alertdeleted', 'Eliminado con exito');
    }
    public function deleteDate(Request $request)
    {
        $data=Proveedores::find($request->Id_proveedor)->delete();
        return response()->json();
    }
    public function exportpdf()
    {
        
        $proveedorespdf=Proveedores::all();
        $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('proveedores.pdf',compact('proveedorespdf'));
        return $pdf->stream('proveedores-list.pdf');

    }
    public function importexcel(Request $request){
        $file=$request->file('file');
        Excel::import(new ProveedoresImport, $file);
        return back()->with('alert', 'Registrado con exito');
    }
}
