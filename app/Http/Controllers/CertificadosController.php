<?php

namespace App\Http\Controllers;

use App\Certificados;
use Illuminate\Http\Request;
use App\Http\Requests\CreatecertificadosRequest;
use App\Http\Requests\ConsultafechasRequest;
use Illuminate\Support\Facades\DB;
use App\Empleados;
use App\Ordenes;
use App\Envases;
use App\Propietarios;
use App\Productos;
use App\CertifiEnvases;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use DataTables;


class CertificadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //

      public function index(Request $request)
    {
 
        if ($request->ajax()) {
  
          return Datatables::of(Certificados::with('empleado','producto')->get())
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
          $btn = '<a type="button" class="editbutton btn btn-primary" href="/certificados/'.$data->Id_certificado.'/edit"><i class="fas fa-edit"></i></a>';
          // $btn .= '&nbsp;';
          // $btn .= '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';

       
                          return $btn;
                  })->addColumn('action2', function($data2){
                    // $btn2 = '<a type="button" class="editbutton btn btn-primary" href="/certificados/'.$data->Id_certificado.'/edit"><i class="fas fa-edit"></i></a>';
                    // $btn2 .= '&nbsp;';
                    $btn2 = '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data2->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
          
                 
                                    return $btn2;
                            })
                  ->rawColumns(['action','action2'])
                  ->make(true);
                  
      }

        return view('certificados.index');
        
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function create()
    {
      
        $produccion=Ordenes::all('Id_produccion','Estado','certi_estado')->where('Estado','==','1')->where('certi_estado','==','0');
        $envase= Envases::all('Id_envase','Clas_producto','Estado_actual','Inventario','Capacidad');
        $producto= Productos::all('Id_producto','Nom_producto');

        $datoscertificados= Certificados::all('Id_certificado');
        $datos=CertifiEnvases::all();
        //$last = Certificados::select('Id_certificado')->latest()->first();

        return view('certificados.create', compact('produccion','envase','datos','datoscertificados','producto'));
        //return view('envases.create');
    }

      public function store(Request $request)
    {
      

        $nuevo=new CertifiEnvases();

        $nuevo->Id_certificado = $request->Id_certificado;
        $nuevo->Id_envase = $request->Id_envase;
        $nuevo->Clas_producto = $request->Clas_producto;
        $nuevo->Cantidad = $request->Cantidad;
        $nuevo->Estado = $request->Estado;
        $nuevo->save();
        return response()->json('ok');
      
        


       


    
    }



/**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
     public function edit(Request $request,$Id_certificado)
    {
          
      $certificados=Certificados::with('producto')->findOrFail($Id_certificado);
      $orden= Ordenes::all()->where('Id_produccion',$request->Id_produccion)->first();
      $producto= Productos::all('Id_producto','Nom_producto');
      $envase= Envases::all('Id_envase','Clas_producto','Estado_actual','Inventario','Capacidad')->where('Estado_actual','==','0')->where('Inventario','==','1');



        return view('certificados.edit',compact('certificados','orden','producto','envase'));

    }

/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id)
    { 
        $datos= CertifiEnvases::findOrFail($Id);


        if ($datos->delete()) {
        
            return response()->json('ok');
        }

               //Envases::destroy($Id_certificado);
       // return redirect('certificados')->with('Mensaje','Certificado eliminado');

    }

    //Codigo Personal
    public function tabla()
    {

        $last = Certificados::select('Id_certificado')->latest()->first();
        $datoscilindros= CertifiEnvases::whereIn('Id_certificado', $last)->with('producto')->get();
        return view('certificados.tabla',compact('datoscilindros'));
    }
    public function tablaedit(Request $request)
    {
        $datoscilindros= CertifiEnvases::where('Id_certificado', $request->Id_certificado)->get();
        return view('certificados.tablaedit',compact('datoscilindros'));
    }

    public function ordenfunt(Request $request){
        $orden= Ordenes::all()->where('Id_produccion',$request->Id_produccion)->first();
        return response()->json($orden);
    }
    public function consulta(Request $request){
        $last = Certificados::select('Id_certificado')->latest()->first();
        //$envase= Envases::all('Id_envase','Estado_actual');
        return response()->json($last);

    }
    public function consultaenvase(Request $request){
        $producto=$request->producto;

        // echo($producto);
         $envase= Envases::where('Estado_actual','0')->where('Inventario','1')->where('Clas_producto',$producto)->get();
         
        return response()->json($envase);

    }

    public function savecerti(Request $request){
        $datosproduccion=new Certificados();
        $datosproduccion->Id_produccion = $request->Id_produccion;
        $datosproduccion->Nom_empleado = $request->Nom_empleado;
        $datosproduccion->Capacidad = $request->Capacidad;
        $datosproduccion->Pureza = $request->Pureza;
        $datosproduccion->Presion = $request->Presion;
        $datosproduccion->Id_producto = $request->Id_producto;
        $datosproduccion->Observaciones = $request->Observaciones;
        $datosproduccion->Estado_certificado = '0';
        $datosproduccion->save();

        return response()->json('ok');
    }
    public function listordenes(Request $request){
        $id = $request->Id_produccion;
        $stock=Ordenes::findOrFail($id);

        if ($stock->update(['certi_estado'=>'1'])) {
        return response()->json($stock);
          
        }
    }


     public function stock(Request $request)
      {
        $id = $request->Id_envase;
        $stock=Envases::findOrFail($id);
        if ($stock->update(['Estado_actual'=>'1'])) {
        return response()->json($stock);
          
        }
         
      }
      public function antistock(Request $request, $Id_envase)
      {
        $id = $request->Id_envase;
        $stock=Envases::findOrFail($id);
        if ($stock->update(['Estado_actual'=>'0'])) {
        return response()->json($stock); 
        }     
      }
       public function reabrir(Request $request)
      {
        $id = $request->Id_produccion;
        $stock=Ordenes::findOrFail($id);

        if ($stock->update(['certi_estado'=>'0'])) {
        return response()->json($stock);
          
        }
    }
     public function editenvase($Id,Certificados $Id_certificado)
      {
        $datos = CertifiEnvases::findOrFail($Id);

          return response()->json($datos);

    }


    public function updateenvase(Request $request, $Id)
      {
        $datos= CertifiEnvases::findOrFail($Id);
        if ($datos->update($request->all())) {
            return response()->json('ok');
        }
    }
    public function finalizarcerti(Request $request,$Id_certificado)
      {
        $id = $request->Id_certificado;
        $stock=Certificados::findOrFail($id);

        if ($stock->update(['Estado_certificado'=>'1'])) {
        return response()->json($stock);
          
        }
    }
    public function exportpdfindi(Request $request, $Id_certificado,CertifiEnvases $Id, Envases $Id_envase)
    {
      $certificado=Certificados::findOrFail($Id_certificado);
         
          $datos=DB::table('certificados_produccion')
          ->join('certificado_envase','certificado_envase.Id_certificado', '=','certificados_produccion.Id_certificado')
          ->join('productos','productos.Id_producto', '=','certificados_produccion.Id_producto')
          ->join('envases','envases.Id_envase', '=','certificado_envase.Id_envase')
          ->join('propietarios','propietarios.Id_propietario', '=','envases.Id_propietario')
          ->select('certificado_envase.Cantidad','certificado_envase.Clas_producto','certificado_envase.Id_envase','propietarios.Nom_propietario')
          ->where('certificado_envase.Id_certificado', $request->Id_certificado)->get()->toArray();

    
        $pdf=PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,"isPhpEnabled", true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('certificados.pdfindi',compact('certificado','datos'));
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->stream('certificado-list.pdf');
    }
    public function consultaproducto(Request $request){
      $producto= Envases::all()->where('Id_envase',$request->Id_envase)->first();
      return response()->json($producto);
  }

  public function informecertificados(ConsultafechasRequest $request)
  {
      $fecha1= $request->fechainicial;
      $fecha2= $request->fechafinal;
     $certificados= Certificados::with('orden','producto')->whereBetween('created_at', [$fecha1, $fecha2])->get();
   
     $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('letter','landscape')->loadView('certificados.pdf',compact('certificados'));
      return $pdf->stream('certificados-list.pdf');
  }
      

}