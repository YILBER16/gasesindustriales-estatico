<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Envase_remision;
use App\Envases;
use App\Clientes;
use App\CertifiEnvases;
use App\Remisiones;
use App\Devoluciones;
use App\Http\Requests\CreateremisionesRequest;
use App\Http\Requests\UpdateremisionenvaseRequest;
use App\Http\Requests\ConsultafechasRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use DataTables;
use Carbon\Carbon;
class RemisionesController extends Controller
{
    public function index(Request $request){
         
        if ($request->ajax()) {
  
            return Datatables::of(Remisiones::with('empleado','cliente')->where('empresa','=','Gases')->get())
                    ->addIndexColumn()
                   ->addColumn('action', function($data){
                    $btn = '<a type="button" class="pdfbutton btn btn-danger" href="/remisiones.pdfindi/'.$data->Id_remision.'"><i class="fas fa-file-pdf"></i></a>';
                    return $btn;
                    })
                    ->rawColumns(['action'])
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
       $oxigeno= Envases::where('Estado_actual','=','1')->where('Inventario','=','1')->where('Clas_producto','=','Oxigeno')->count();

        return view('remisiones.index',compact('aire','oxigeno_m','oxigeno_i','nitrogeno','co2','argon','acetileno','mezclas','helio','oxigeno'));
    }
    public function create(){
        $clientes=Clientes::all('Id_cliente','Nom_cliente');
        $envases=Envases::select('Id_envase','Estado_actual','Inventario')->where('Estado_actual','1')->where('Inventario',1)->get();
    
       return view('remisiones.create',compact('clientes','envases'));
    }

    public function store(CreateremisionesRequest $request){
    // dd($request->all());
    $datosremision=new Remisiones();
    $datosremision->Id_remision = $request->Id_remision;
    $datosremision->empresa = $request->empresa;
    $datosremision->Fecha_remision = $request->Fecha_remision;
    $datosremision->Id_cliente = $request->Id_cliente;
    $datosremision->Nom_empleado = $request->Nom_empleado;
    $datosremision->Id_empleado = $request->Id_empleado;
    $datosremision->Observaciones = $request->Observaciones;
    $datosremision->save();

    $c=count($request['prueba']);
    $recorrer=array_values($request['prueba']);
    for($i=0;$i<$c;$i++)
    {
        $datos[]= array (
            'Id_remision'=> $recorrer[$i]['Id_remision_cilindro'],
            'Id_envase'=>  $recorrer[$i]['Id_envase_cilindro'],
            'Id_certificado'=>  $recorrer[$i]['Id_certificado_cilindro'],
            'Producto'=>  $recorrer[$i]['Producto_cilindro'],
            'Cantidad'=>  $recorrer[$i]['Cantidad_cilindro'],
            'Estado'=>  '0',
            'created_at'=> \Carbon\Carbon::now(),
            'updated_at'=> \Carbon\Carbon::now(),
        );
        $stock=Envases::findOrFail($recorrer[$i]['Id_envase_cilindro']);
        if ($stock->update(['Inventario'=>'0'])) {
        }
    }
    Envase_remision::insert($datos);
    
    return response()->json('ok');
    }
    public function consecutivo(Request $request)
  {
    $resultado= Remisiones::all()->where('empresa','=',$request->empresa)->last();
    if($resultado == ''){
    $ultimoAgregadosumado=1 ;
    return response()->json($ultimoAgregadosumado);
    }
    $conversion = preg_replace('/[0-9]+/', '', $resultado->Id_remision);
    if($conversion == 'Gases-'){
        $valor=preg_replace('~\D~', '', $resultado->Id_remision);
        $ultimoAgregadosumado=$valor + 1 ;
        return response()->json($ultimoAgregadosumado);
    }
    if($conversion == 'Soluciones-'){
        $valor=preg_replace('~\D~', '', $resultado->Id_remision);
            $ultimoAgregadosumado=$valor + 1 ;
            return response()->json($ultimoAgregadosumado);
        } 
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
    public function envasesafuera(Request $request)
    {
        if ($request->ajax()) {
  
            return Datatables::of(Envase_remision::with('remision','remision.cliente')->where('Estado', 0))
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a type="submit" class="btn btn-primary" id="elim" name="elim" onclick="ver_datos('.$data->Id.')" data-toggle="modal" data-target="#modalremisionedicion"><i class="fas fa-arrow-right"></i></a>';

                                        return $btn;
                                })->addColumn('action2', function($data2){
                                    $btn2 = '<a type="submit" class="devolverbutton btn btn-danger" id="devolverbutton" name="devolverbutton" data-toggle="modal" data-target="#devolucionmodal" data-info="'.$data2->Id.';'.$data2->Id_envase.';'.$data2->remision->Id_remision.';'.$data2->remision->cliente->Id_cliente.';'.$data2->remision->cliente->Nom_cliente.';'.$data2->Producto.';'.$data2->Cantidad.'"><i class="fas fa-exchange-alt"></i></a>';
            
                                                    return $btn2;
                                            })->addColumn('action3', function($data3){
                                                $btn3 = '<a type="submit" class="btn btn-danger" id="submit" name="submit" onclick="antistockinventario('.$data3->Id_envase.');stockinventario('.$data3->Id_envase.');"><i class="fas fa-exchange-alt"></i></a>';
                         
                                                                return $btn3;
                                                        })
                    ->rawColumns(['action','action2','action3'])
                    ->make(true);
                    
        }
        $fecha_actual= Carbon::now()->format('Y-m-d\TH:i');
        return view('remisiones.indexrecepcion',compact('fecha_actual'));
       
    }
    public function recibirenvase(UpdateremisionenvaseRequest $request, $Id)
      {
        $acfecha= Envase_remision::findOrFail($Id);
        $acenvase= Envases::findOrFail($request->Id_envase);
        // dd($acenvase);
        if ($acfecha->update(['Fecha_ingreso'=> $request->Fecha_ingreso,'Estado'=>'1']) && $acenvase->update(['Inventario'=> '1','Estado_actual'=>'0'])) {
            return response()->json('Actualizado');
        }
    }
      public function devolucionenvase(Request $request)
      {
        $acfecha= Envase_remision::findOrFail($Id);
        $acenvase= Envases::findOrFail($request->Id_envase);
        // dd($acenvase);
        if ($acfecha->update(['Fecha_ingreso'=> $request->Fecha_ingreso,'Estado'=>'1']) && $acenvase->update(['Inventario'=> '1','Estado_actual'=>'0'])) {
            return response()->json('Actualizado');
        } 
      }
      public function eliminarenvaseremision(Request $request)
      {
        $devolucionenvase=Envase_remision::find($request->Id)->delete();
        return response()->json();
     
      }
      public function cambioenvasedevoluciones(Request $request)
      {
        $stockenvase=Envases::find($request->Id_envase);
        if ($stockenvase->update(['Inventario'=>'1','Estado_actual'=>'1'])) {
        return response()->json($stockenvase);
        }  
      }
      public function editdevolucion($Id,Envase_remision $Id_remision)
      {
        $datos = Envase_remision::findOrFail($Id);
        return response()->json($datos);
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
    public function exportpdfindi(Request $request, $Id_remision,Envases $Id_envase)
    {
          $remision=Remisiones::findOrFail($Id_remision);
          $datos= Envase_remision::all()->where('Id_remision', $request->Id_remision);
        if($remision->empresa=='Gases'){
            $pdf=PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,"isPhpEnabled", true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('remisiones.pdfindi',compact('remision','datos'));
            $pdf->getDomPDF()->set_option("enable_php", true);
            return $pdf->stream('remision.pdf');
         }
         else{
            $pdf=PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,"isPhpEnabled", true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('remisiones.pdfindisoluciones',compact('remision','datos'));
            $pdf->getDomPDF()->set_option("enable_php", true);
            return $pdf->stream('remision.pdf');
         }
    }
    public function informetotalremisiones(ConsultafechasRequest $request)
    {
        $empresa=$request->empresa; 
        $fecha1= $request->fechainicial;
        $fecha2= $request->fechafinal;
        $remisiones= Remisiones::with('cliente')->whereBetween('created_at', [$fecha1, $fecha2])->where('empresa','=',$empresa)->get();
        $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('remisiones.pdf',compact('remisiones'));
        return $pdf->stream('remisiones-list.pdf');
    }
    public function indexsoluciones(Request $request)
    {        
    if ($request->ajax()) {
  
            return Datatables::of(Remisiones::with('empleado','cliente')->where('empresa','=','Soluciones')->get())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                    $btn = '<a type="button" class="pdfbutton btn btn-danger" href="/remisiones.pdfindi/'.$data->Id_remision.'"><i class="fas fa-file-pdf"></i></a>';
                    return $btn;
                    })
                    ->rawColumns(['action'])
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
    return view('remisiones.index-soluciones',compact('aire','oxigeno_m','oxigeno_i','nitrogeno','co2','argon','acetileno','mezclas','helio'));
    }
}
