<?php

namespace App\Http\Controllers;

use App\Envases;

use Illuminate\Http\Request;
use App\Http\Requests\CreateenvasesRequest;
use App\Http\Requests\UpdateEnvasesRequest;
use Illuminate\Support\Facades\DB;
use App\Propietarios;
use App\Proveedores;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\EnvasesImport;
use DataTables;


class EnvasesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index(Request $request)
    {
        if ($request->ajax()) {
  
            return Datatables::of(Envases::select('Id_envase','Id_propietario','Capacidad','Clas_producto','Garantia')->with('propietario')->get())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
            $btn = '<a type="button" class="viewbutton btn bg-primary" href="/envases/'.$data->Id_envase.'"><i class="fas fa-eye"></i></a>';
            $btn .= '&nbsp;';
            $btn .= '<a type="button" class="editbutton btn btn-primary" href="/envases/'.$data->Id_envase.'/edit"><i class="fas fa-edit"></i></a>';
            $btn .= '&nbsp;';
            $btn .= '<button  class="deletebutton btn btn-danger"  data-toggle="modal" data-target="#deletemodal" data-info="'.$data->Id_envase.';'.$data->Id_envase.'"><i class="fas fa-trash-alt"></i></button>';
          
         
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
                            }

        return view('envases.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
        $propietarios=Propietarios::all('Id_propietario','Nom_propietario');
        $proveedores=Proveedores::all('Id_proveedor','Nom_proveedor');
     

        return view('envases.create', compact('propietarios','proveedores'));
        //return view('envases.create');
    }

     public function store(CreateenvasesRequest $request)
    {
     
        $datosEnvase=request()->all();

        $datosEnvase=request()->except('_token');
       

        Envases::insert($datosEnvase);

        $tipo = "alert alert-success";
        

 
     
       // Session::flash('flash_message','Guardado con exito');
        return redirect('envases')->with('alert', 'Registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
     public function edit($Id_envase)
    {
          $envase=Envases::findOrFail($Id_envase);
          $propietarios=Propietarios::all('Id_propietario','Nom_propietario');
          $proveedores=Proveedores::all('Id_proveedor','Nom_proveedor');

        return view('envases.edit',compact('envase','propietarios','proveedores'));
    }


    public function show(Envases $envase)
    {
        return view('envases.show', ['envases'=>$envase]);
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnvasesRequest $request, $Id_envase)
    {
        
      $datosEnvase=request()->except(['_token','_method']);
       Envases::where('Id_envase','=',$Id_envase)->update($datosEnvase);
        
        return redirect('envases')->with('alertedit', 'Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_envase)
    {
       
        // $envase=Envases::find($Id_envase);
        // $envase->delete();
        // return redirect('envases')->with('alertdeleted', 'Eliminado con exito');
    }
    public function deleteDate(Request $request)
    {
        $data=Envases::find($request->Id_envase)->delete();
        return response()->json();
    }
    public function exportpdf()
    {

        $datos['envasespdf']=DB::table('envases')
        ->join('propietarios','propietarios.Id_propietario', '=','envases.Id_propietario')
        ->leftjoin('proveedores','proveedores.Id_proveedor', '=','envases.Id_proveedor')
        ->select('envases.Id_envase','envases.Id_propietario','envases.N_int_envase','envases.Estado_envase','envases.Material','envases.U_medida','envases.Capacidad','envases.Clas_producto','envases.Presion','envases.Alt_c_valvula','envases.P_c_valvula','envases.Valvula','envases.Color','envases.N_int_fabricacion','envases.Tapa','envases.Fecha_compra','envases.Garantia','envases.Fecha_fabricacion','envases.Prueba_hidrostatica','propietarios.Nom_propietario','proveedores.Nom_proveedor')
        ->get();
 
   
        $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('letter','landscape')->loadView('envases.pdf',$datos);
        return $pdf->stream('envases-list.pdf');

    }

    public function exportpdfindi(Request $request, $Id_envase)
    {
          $envase=Envases::findOrFail($Id_envase);
         
            $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('letter','landscape')->loadView('envases.pdfindi',compact('envase'));
               
        return $pdf->stream('envases-list.pdf');
    }
    public function importexcel(Request $request){
        $file=$request->file('file');
        Excel::import(new EnvasesImport, $file);
        return back()->with('alert', 'Registrado con exito');
    }



}
