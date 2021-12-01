<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ordenes;
use App\Envases;
use App\Propietarios;
use App\Productos;
use App\CertifiEnvases;
use App\Certificados;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use DataTables;
use App\Http\Requests\CreatecertificadosRequest;
class pruebasController extends Controller
{
    public function index(Request $request)
    {
 
        if ($request->ajax()) {
  
          return Datatables::of(Certificados::with('empleado','producto')->get())
                  ->addIndexColumn()
                  ->addColumn('action', function($data){
                        $btn = '<a type="button" class="editbutton btn btn-primary" href="/certificados/'.$data->Id_certificado.'/edit"><i class="fas fa-edit"></i></a>';
                        return $btn;
                  })->addColumn('action2', function($data2){
                    $btn2 = '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data2->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
                    return $btn2;
                    })
                  ->rawColumns(['action','action2'])
                  ->make(true);
                  
      }
        return view('pruebas.index');   
    }
    public function create()
    {
        $produccion=Ordenes::all('Id_produccion','Estado','certi_estado')->where('Estado','==','1')->where('certi_estado','==','0');
        $envases= Envases::all('Id_envase','Clas_producto','Estado_actual','Inventario','Capacidad');
        $producto= Productos::all('Id_producto','Nom_producto');
        $datoscertificados= Certificados::all('Id_certificado');
        $datos=CertifiEnvases::all();
        $resultado= Certificados::select('Id_certificado')->get()->last();
        if($resultado==""){
            $resultado=1;
        }else{
            $resultado=$resultado+1;
        }
        return view('pruebas.create', compact('produccion','envases','datos','datoscertificados','producto','resultado'));
    }
    public function store(Request $request){
        dd($request->all());
        $datoscertificado=new Certificados();
        $datoscertificado->Id_ = $request->Id_remision;
        $datoscertificado->empresa = $request->empresa;
        $datoscertificado->Fecha_remision = $request->Fecha_remision;
        $datoscertificado->Id_cliente = $request->Id_cliente;
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
    public function ordenfunt(Request $request){
        $orden= Ordenes::all()->where('Id_produccion',$request->Id_produccion)->first();
        return response()->json($orden);
    }
    public function consultaproducto(Request $request){
        $producto= Envases::all()->where('Id_envase',$request->Id_envase)->first();
        return response()->json($producto);
    }
    public function consultaenvase(Request $request){
        $producto=$request->producto;
        // echo($producto);
         $envase= Envases::where('Estado_actual','0')->where('Inventario','1')->where('Clas_producto',$producto)->get();
        return response()->json($envase);

    }
}
