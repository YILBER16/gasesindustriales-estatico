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
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
       $Id=$request->get('buscarpor');

        $datos=DB::table('remisiones')
        ->join('clientes','clientes.Id_cliente', '=','remisiones.Id_cliente')
        ->join('empleados','empleados.Id_empleado', '=','remisiones.Id_empleado')
        ->select('clientes.Id_cliente','clientes.Nom_cliente','remisiones.Id_remision','remisiones.Fecha_remision','remisiones.Id_empleado','remisiones.Estado_remision','empleados.Nom_empleado')
        ->get();

        $datos2=DB::table('envase_remision')
        ->join('remisiones','remisiones.Id_remision', '=','envase_remision.Id_remision')
        ->select('envase_remision.Id','envase_remision.Id_envase','envase_remision.Id_remision','envase_remision.Producto','envase_remision.Cantidad','remisiones.Fecha_remision')->where('Estado', 1)->where('Estado_remision', 1)->get();
        
        
        if($request->ajax())
       {
        return response()->json(view('remisiones.formentrada',$datos2));

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


  
       
       
        
        return view('remisiones.index',compact('datos','datos2','aire','oxigeno_m','oxigeno_i','nitrogeno','co2','argon','acetileno','mezclas','helio'));
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
        $nuevo->Producto = $request->Id_producto;
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
     public function datosempleados(Request $request){
        $empleados= Empleados::all()->where('Id_empleado',$request->Id_empleado)->first();
        return response()->json($empleados);
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
        return view('remisiones.formentrada',compact('data'))->render();
       }
    }
    public function editremision($Id,Envase_remision $Id_remision)
      {
        $datos = Envase_remision::findOrFail($Id);

          return response()->json($datos);

    }
    public function updateenvase(Request $request, $Id)
      {
        $datos= Envase_remision::findOrFail($Id);
        if ($datos->update($request->all())) {
            return response()->json('ok');
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
        $stock=Envase_remision::findOrFail($id);

        if ($stock->update(['Estado'=>'0'])) {
        return response()->json($stock);
          
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

}