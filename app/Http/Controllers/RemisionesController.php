<?php

namespace App\Http\Controllers;

use App\Remisiones;
use Illuminate\Http\Request;
use App\Clientes;
use App\Empleados;
use App\Envases;
use App\Envase_remision;
use App\CertifiEnvases;
use App\Certificados;
use App\Devoluciones;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use DataTables;
use App\Http\Requests\UpdateremisionenvaseRequest;
use App\Http\Requests\ConsultafechasRequest;
use Carbon\Carbon;

class RemisionesController extends Controller
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
  
            return Datatables::of(Remisiones::with('empleado','cliente')->get())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a type="button" class="editbutton btn btn-primary" href="/remisiones/'.$data->Id_remision.'/edit"><i class="fas fa-edit"></i></a>';

                        // $btn .= '&nbsp;';
                        // $btn .= '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
              
                     
                                        return $btn;
                                })->addColumn('action2', function($data2){
                                    $btn2 = '<a type="button" class="pdfbutton btn btn-danger" href="/remisiones.pdfindi/'.$data2->Id_remision.'"><i class="fas fa-file-pdf"></i></a>';
            
                                  // $btn2 = '<a type="button" class="editbutton btn btn-primary" href="/certificados/'.$data->Id_certificado.'/edit"><i class="fas fa-edit"></i></a>';
                                  // $btn2 .= '&nbsp;';
                      
                               
                                                  return $btn2;
                                          })->addColumn('action3', function($data3){
                                            $btn3 = '<button  class="deletebutton btn btn-danger"  data-toggle="modal" data-target="#deletemodal" data-info="'.$data3->Id_remision.'"><i class="fas fa-trash-alt"></i></button>';
                        
                                              // $btn2 = '<a type="button" class="editbutton btn btn-primary" href="/certificados/'.$data->Id_certificado.'/edit"><i class="fas fa-edit"></i></a>';
                                              // $btn2 .= '&nbsp;';
                                  
                                           
                                                              return $btn3;
                                                      })
                    ->rawColumns(['action','action2','action3'])
                    ->make(true);
                    
        }
       

       $aire= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Aire')->count();
       $oxigeno_m= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Oxigeno medicinal')->count();
       $oxigeno_i= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Oxigeno industrial')->count();
       $nitrogeno= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Nitrogeno')->count();
       $argon= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Argon')->count();
       $acetileno= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Acetileno')->count();
       $co2= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Co2')->count();
       $mezclas= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Mezclas')->count();
       $helio= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Helio')->count();


       
       
        
        return view('remisiones.index',compact('aire','oxigeno_m','oxigeno_i','nitrogeno','co2','argon','acetileno','mezclas','helio'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empleados=Empleados::all('Id_empleado','Nom_empleado');
        $clientes=Clientes::all('Id_cliente','Nom_cliente');
        $envases=CertifiEnvases::all('Id_envase','Estado')->where('Estado','==','1');
        $documentos= Remisiones::all();

        $ultimoAgregado  = $documentos->last();
        if($ultimoAgregado == null){
        $ultimoAgregadosumado='00000'+ 1 ;
        
    }else{
        $ultimoAgregadosumado=$ultimoAgregado->Id_remision + 1 ;
    }
    

       return view('remisiones.create',compact('empleados','clientes','envases','ultimoAgregadosumado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nuevo=new Envase_remision();

        $nuevo->Id_remision = $request->Id_remision1;
        $nuevo->Id_envase = $request->Id_envase;
        $nuevo->Producto = $request->Clas_producto;
        $nuevo->Cantidad = $request->Cantidad;
        $nuevo->Estado = '1';
        $nuevo->save();
        return response()->json('ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Remisiones  $remisiones
     * @return \Illuminate\Http\Response
     */
    public function show(Remisiones $remisiones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Remisiones  $remisiones
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $Id_remision)
    {
        $remisiones=Remisiones::findOrFail($Id_remision);
        $empleados=Empleados::all('Id_empleado','Nom_empleado');
        $clientes=Clientes::all('Id_cliente','Nom_cliente');
        $envase= Envases::all('Id_envase','Estado_actual','Inventario')->where('Estado_actual','==','0')->where('Inventario','==','1');
        


        return view('remisiones.edit',compact('remisiones','empleados','clientes','envase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Remisiones  $remisiones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_remision)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Remisiones  $remisiones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $Id_remision)
    {
        try {
       Remisiones::destroy($Id_remision);
       } catch (ModelNotFoundException $exception) {
        return back()->withError($exception->getMessage())->withInput();
    }

        return redirect('remisiones')->with('alertdeleted', 'Eliminado con exito');


    }
    public function tabla()

    {
        $last = Remisiones::select('Id_remision')->latest()->first();
        //dd($last);
        $datos= Envase_remision::all()->whereIn('Id_remision', $last);
        
        return view('remisiones.tabla',compact('datos'));
    }



    public function tablaedit(Request $request,$Id_remision)
    {
        $last = Remisiones::findOrFail($Id_remision);
        
        $datos= Envase_remision::all()->where('Id_remision', $request->Id_remision);

        
        return view('remisiones.tablaedit',compact('datos'));
    }

    public function datosclientes(Request $request)
    {
        $clientes= Clientes::all()->where('Id_cliente',$request->Id_cliente)->first();
        return response()->json($clientes);
    }
     
    public function datosenvasecerti(Request $request)
    {
        $datenvases= CertifiEnvases::all()->where('Id_envase',$request->Id_envase)->last();
        return response()->json($datenvases);
    }

public function saveremi(Request $request){
        $datosremision=new Remisiones();
        $datosremision->Id_remision = $request->Id_remision;
        $datosremision->Fecha_remision = $request->Fecha_remision;
        $datosremision->Id_cliente = $request->Id_cliente;
        $datosremision->Nom_empleado = $request->Nom_empleado;
        $datosremision->Id_empleado = $request->Id_empleado;
        $datosremision->Estado_remision = '0';
        $datosremision->save();
        return response()->json('ok');
    }
public function consultaremi(Request $request){
        $last = Remisiones::select('Id_remision')->latest()->first();
        //$envase= Envases::all('Id_envase','Estado_actual');
        return response()->json($last);
   
}
 
  
    public function consultaenvaseremisiones(Request $request){
         $envase= Envases::all('Id_envase','Estado_actual','Inventario')->where('Estado_actual','==','1')->where('Inventario','==','1');
        return response()->json($envase);

    }
         public function stockremisiones(Request $request)
      {
        $id = $request->Id_envase;
        $stock=Envases::findOrFail($id);

        if ($stock->update(['Inventario'=>'0'])) {
        return response()->json($stock);
          
        }
         
      }
      public function consultadatosenvase(Request $request){
         $id = $request->Id_envase;
        $stock=CertifiEnvases::findOrFail($id);

        return response()->json($envase);

    }
    public function antistockremisiones(Request $request, $Id_envase)
      {
        $id = $request->Id_envase;
        $stock=Envases::findOrFail($id);

        if ($stock->update(['Inventario'=>'1'])) {
        return response()->json($stock);
          
        }
         
      }

      public function finalizarremi(Request $request,$Id_remision)
      {
        $id = $request->Id_remision;
        $stock=Remisiones::findOrFail($id);

        if ($stock->update(['Estado_remision'=>'1'])) {
        return response()->json($stock);
          
        }
    }
    public function fetch_data(Request $request){
       if($request->ajax())
       {
        $data=Envase_remision::select('Id_envase','Estado')->where('Estado', 0)->where('Id_envase','LIKE',"%$Id%")->orderBy('Id_envase','DESC')->paginate(5);
        dd($data);
        return view('remisiones.indexrecepcion',compact('data'))->render();
       }
    }
    public function editremision($Id,Envase_remision $Id_remision)
      {
        $datos = Envase_remision::findOrFail($Id);

          return response()->json($datos);

    }
    public function updateenvase(UpdateremisionenvaseRequest $request, $Id)
      {
        $datos= Envase_remision::findOrFail($Id);
        if ($datos->update(['Fecha_ingreso'=> $request->Fecha_ingreso])) {
            return response()->json('Actualizado');
        }
    }
    public function stockinventario(Request $request, $Id_envase)
      {
        $id = $request->Id_envase;
        $stock=Envases::findOrFail($id);

        if ($stock->update(['Inventario'=>'1','Estado_actual'=>'0'])) {
        return response()->json($stock);
          
        }
         
      }
      public function antistockinventario(Request $request, $Id)
      {
        $id = $request->Id;
        $antistockinventario=Envase_remision::findOrFail($id);

        if ($antistockinventario->update(['Estado'=>'0'])) {
        return response()->json($antistockinventario);
          
        }
         
      }
      public function exportpdfindi(Request $request, $Id_remision,Envases $Id_envase)
    {
      
          $remision=Remisiones::findOrFail($Id_remision);
          
          $datos= Envase_remision::all()->where('Id_remision', $request->Id_remision);

   
        
        $pdf=PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,"isPhpEnabled", true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('remisiones.pdfindi',compact('remision','datos'));
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->stream('remision.pdf');
    }
        public function eliminar($Id)
    {
        
        $datos= Envase_remision::findOrFail($Id);


        if ($datos->delete()) {
        
            return response()->json('ok');
        }

    }
    public function envasesafuera(Request $request)
    {
        if ($request->ajax()) {
  
            return Datatables::of(Envase_remision::with('remision','remision.cliente')->where('Estado', 1)->whereHas('remision', function ($query) {
                $query->where('Estado_remision', '=', 1);
            })->get())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a type="submit" class="btn btn-primary" id="elim" name="elim" onclick="ver_datos('.$data->Id.')" data-toggle="modal" data-target="#modalremisionedicion"><i class="fas fa-arrow-right"></i></a>';

                        // $btn .= '&nbsp;';
                        // $btn .= '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
              
                     
                                        return $btn;
                                })->addColumn('action2', function($data2){
                                    $btn2 = '<a type="submit" class="devolverbutton btn btn-danger" id="devolverbutton" name="devolverbutton" data-toggle="modal" data-target="#devolucionmodal" data-info="'.$data2->Id.';'.$data2->Id_envase.';'.$data2->remision->Id_remision.';'.$data2->remision->cliente->Id_cliente.';'.$data2->remision->cliente->Nom_cliente.';'.$data2->Producto.';'.$data2->Cantidad.'"><i class="fas fa-exchange-alt"></i></a>';
                                    // $btn2 = '<a type="submit" class="devolverbutton btn btn-danger" id="devolverbutton" name="devolverbutton" href="/stockdevoluciones/'.$data2->Id.'"><i class="fas fa-exchange-alt"></i></a>';

                                    // $btn .= '&nbsp;';
                                    // $btn .= '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
                          
                                 
                                                    return $btn2;
                                            })->addColumn('action3', function($data3){
                                                $btn3 = '<a type="submit" class="btn btn-danger" id="submit" name="submit" onclick="antistockinventario('.$data3->Id_envase.');stockinventario('.$data3->Id_envase.');"><i class="fas fa-exchange-alt"></i></a>';
                        
                                                // $btn .= '&nbsp;';
                                                // $btn .= '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
                                      
                                             
                                                                return $btn3;
                                                        })
                    ->rawColumns(['action','action2','action3'])
                    ->make(true);
                    
        }
        $fecha_actual= Carbon::now()->format('Y-m-d\TH:i');
        // $envasesafuera = Envase_remision::with('remision','remision.cliente')->where('Estado', 1)->whereHas('remision', function ($query) {
        //     $query->where('Estado_remision', '=', 1);
        // })->get();
  
        return view('remisiones.indexrecepcion',compact('fecha_actual'));
       
    }
    public function elimenvasedevoluciones(Request $request)
      {
      
       // $devolucion=Envases::findOrFail($id);
        $devolucionenvase=Envase_remision::find($request->Id)->delete();
        return response()->json();
  
        
        // if ($stock->update(['Inventario'=>'1'])) {
        // return response()->json($stock);
        
        // }
         
      }
      public function stockenvasedevoluciones(Request $request)
      {
        // $Id_envase = $request->Id_envase;
        $stockenvase=Envases::find($request->Id_envase);

        if ($stockenvase->update(['Inventario'=>'1'])) {
        return response()->json($stockenvase);
          
        }
         
      }
      public function registrardevolucion(Request $request){
        $validatedData = $request->validate([
            'dremision' => 'required',
            'Fecha_devolucion' => 'required',
            'd_cliente' => 'required',
            'denvase' => 'required',
            'd_producto' => 'required',
            'c_producto' => 'required',
            'd_empleado' => 'required',
            'n_empleado' => 'required',
            'descripcion' => 'required',
        ]);
        $devolucion=new Devoluciones();
        $devolucion->Id_remision = $request->dremision;
        $devolucion->Fecha_devolucion = $request->Fecha_devolucion;
        $devolucion->Id_cliente = $request->d_cliente;
        $devolucion->Id_envase = $request->denvase;
        $devolucion->Producto = $request->d_producto;
        $devolucion->Cantidad = $request->c_producto;
        $devolucion->Id_empleado = $request->d_empleado;
        $devolucion->Nom_empleado = $request->n_empleado;
        $devolucion->Descripcion = $request->descripcion;

        

        $devolucion->save();
        return response()->json('ok');
    }

    public function informeremisiones(ConsultafechasRequest $request)
  {
      $fecha1= $request->fechainicial;
      $fecha2= $request->fechafinal;
     $remisiones= Remisiones::with('cliente')->whereBetween('created_at', [$fecha1, $fecha2])->get();
   
     $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('remisiones.pdf',compact('remisiones'));
      return $pdf->stream('remisiones-list.pdf');
  }

}