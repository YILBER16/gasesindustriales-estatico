<?php

namespace App\Http\Controllers;

use App\Ordenes;
use Illuminate\Http\Request;
use App\Http\Requests\CreateordenesRequest;
use Carbon\Carbon;
use DataTables;

class OrdenesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
      public function index(Request $request)
    {
        if ($request->ajax()) {
  
            return Datatables::of(Ordenes::all())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
            $btn = '<a type="button" class="eyebutton btn btn-primary" href="/ordenes/'.$data->Id_produccion.'"><i class="fas fa-eye"></i></a>';
            // $btn .= '&nbsp;';
            // $btn .= '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
  
         
                            return $btn;
                    })->addColumn('action2', function($data2){
                    $btn2 = '<a type="button" class="editbutton btn btn-primary" href="/ordenes/'.$data2->Id_produccion.'/edit"><i class="fas fa-edit"></i></a>';

                      // $btn2 = '<a type="button" class="editbutton btn btn-primary" href="/certificados/'.$data->Id_certificado.'/edit"><i class="fas fa-edit"></i></a>';
                      // $btn2 .= '&nbsp;';
          
                   
                                      return $btn2;
                              })->addColumn('action3', function($data3){
                                $btn3 = '<button  class="deletebutton btn btn-danger"  data-toggle="modal" data-target="#deletemodal" data-info="'.$data3->Id_produccion.';'.$data3->Id_produccion.'"><i class="fas fa-trash-alt"></i></button>';
            
                                  // $btn2 = '<a type="button" class="editbutton btn btn-primary" href="/certificados/'.$data->Id_certificado.'/edit"><i class="fas fa-edit"></i></a>';
                                  // $btn2 .= '&nbsp;';
                      
                               
                                                  return $btn3;
                                          })
                    ->rawColumns(['action','action2','action3'])
                    ->make(true);
                    
        }
        return view('ordenes.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
     $documentos= Ordenes::all();

        $ultimoAgregado  = $documentos->last();
        if($ultimoAgregado == null){
        $ultimoAgregadosumado='00000'+ 1 ;
        
    }else{
        $ultimoAgregadosumado=$ultimoAgregado->Id_produccion + 1 ;
    }
    


        return view('ordenes.create',compact('ultimoAgregadosumado'));
        //return view('envases.create');
    }

     public function store(CreateordenesRequest $request)
    {
     
        

        $nuevo=new Ordenes();

        $nuevo->Id_produccion = $request->Id_produccion;
        $nuevo->Fecha_solicitud = $request->Fecha_solicitud;
        $nuevo->N_lote = $request->N_lote;
        $nuevo->N_envases = $request->N_envases;
        $nuevo->Cantidad_m3 = $request->Cantidad_m3;
        $nuevo->Turno = $request->Turno;
        $nuevo->Fecha_vencimiento = $request->Fecha_vencimiento;
        $nuevo->Estado = $request->Estado;
        $nuevo->certi_estado = $request->certi_estado;
        $nuevo->save();
       

    


 
     
       // Session::flash('flash_message','Guardado con exito');
        return redirect('ordenes')->with('alert', 'Registrado con exito');
    }


/**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show($Id_produccion)
    {
       
        $orden=Ordenes::findOrFail($Id_produccion); 
        $formatted_dt1=Carbon::parse($orden->created_at);
        $formatted_dt2=Carbon::parse($orden->updated_at);
        $date_diff=$formatted_dt1->diffInHours($formatted_dt2) . ':' . $formatted_dt1->diff($formatted_dt2)->format('%I:%S');

        return view('ordenes.show',compact('orden','date_diff'));
        //return view('ordenes.show', ['ordenes'=>$orden]);

        
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
     public function edit($Id_produccion)
    {
          $orden=Ordenes::findOrFail($Id_produccion);

        return view('ordenes.edit',compact('orden'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_produccion)
    {
      $datosOrden=request()->except(['_token','_method']);
       Ordenes::where('Id_produccion','=',$Id_produccion)->update($datosOrden);
        
        return redirect('ordenes')->with('alertedit', 'Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_produccion)
    {
        //        Ordenes::destroy($Id_produccion);
        // return redirect('ordenes')->with('alertdeleted', 'Eliminado con exito');
    }
    public function deleteDateordenes(Request $request)
    {
        $data=Ordenes::find($request->Id_produccion)->delete();
        return response()->json();
    }
}
