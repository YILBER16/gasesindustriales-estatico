<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Envases;
use App\Envase_remision;
use App\CertifiEnvases;
use App\Certificados;
use App\Clientes;
use App\Remisiones;
use DB;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
class KardesController extends Controller
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
    public function index()
    {
       $datos['envases']= Envases::all();
       $clientes['clientes']=Clientes::all();       
        
        return view('kardes.index',$datos,$clientes);
    }
    public function show($Id_envase, Request $request)
    {
       $envase=Envases::findOrFail($Id_envase);
       
       $datos['resultado']=DB::table('certificado_envase')
       ->join('certificados_produccion','certificados_produccion.Id_certificado', '=','certificado_envase.Id_certificado')

       ->join('envases','envases.Id_envase', '=','certificado_envase.Id_envase')

       ->join('orden_produccion','orden_produccion.Id_produccion', '=','certificados_produccion.Id_produccion')

       ->select('certificados_produccion.created_at','certificados_produccion.Id_certificado','envases.Id_propietario','certificado_envase.Id_envase','orden_produccion.N_lote','orden_produccion.Fecha_vencimiento')

       ->whereIn('envases.Id_envase', $envase)->get()->toArray();


       $datos2['resultado2']=DB::table('envase_remision')
       ->join('remisiones','remisiones.Id_remision', '=','envase_remision.Id_remision')
       ->join('clientes','clientes.Id_cliente', '=','remisiones.Id_cliente')
       ->select('envase_remision.Cantidad','envase_remision.Producto','envase_remision.created_at','remisiones.Id_cliente','envase_remision.Fecha_ingreso','clientes.Nom_cliente')

       ->whereIn('envase_remision.Id_envase', $envase)->get()->toArray();
       
     
        return view('kardes.show',$datos, $datos2);
    }

        public function exportpdfindi(Request $request, $Id_envase)
    {
      
          $envase=Envases::findOrFail($Id_envase);

          $datos=DB::table('certificado_envase')
       ->join('certificados_produccion','certificados_produccion.Id_certificado', '=','certificado_envase.Id_certificado')

       ->join('envases','envases.Id_envase', '=','certificado_envase.Id_envase')

       ->join('orden_produccion','orden_produccion.Id_produccion', '=','certificados_produccion.Id_produccion')

       ->select('certificados_produccion.created_at','certificados_produccion.Id_certificado','envases.Id_propietario','certificado_envase.Id_envase','orden_produccion.N_lote','orden_produccion.Fecha_vencimiento')

       ->whereIn('envases.Id_envase', $envase)->get()->toArray();


       

      $datos2= Envase_remision::with('remision','remision.cliente')->whereIn('envase_remision.Id_envase', $envase)->get();



        $pdf=PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,"isPhpEnabled", true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('kardes.pdfindi',compact('envase','datos','datos2'));
        $pdf->getDomPDF()->set_option("enable_php", true);
        return $pdf->stream('kardes-list.pdf');
    }

    public function resumencliente(Request $request, $Id_cliente)
    {
        $check= $request->fechas;
        $fechainicial= $request->fechainicial;
        $fechafinal= $request->fechafinal;
        //Consulta join
        if($check=='si'){

            $this->validate($request, [
                'fechainicial' => 'required|date',
                'fechafinal' => 'required|date|after_or_equal:fechainicial',
                ]);

            $Id_cliente=DB::table('clientes')
            ->join('remisiones','remisiones.Id_cliente', '=','clientes.Id_cliente')
            ->join('envase_remision','envase_remision.Id_remision', '=','remisiones.Id_remision')
            ->select('envase_remision.Id_remision','envase_remision.Id_envase','envase_remision.Producto','envase_remision.Cantidad','envase_remision.created_at','envase_remision.Fecha_ingreso')
            ->where('remisiones.Id_cliente', $request->Id_cliente)->whereBetween('envase_remision.created_at', [$fechainicial, $fechafinal])->orderBy('Id_remision', 'DESC')->get()->toArray();
            return response()->json($Id_cliente);
        }
        else{
            $Id_cliente=DB::table('clientes')
            ->join('remisiones','remisiones.Id_cliente', '=','clientes.Id_cliente')
            ->join('envase_remision','envase_remision.Id_remision', '=','remisiones.Id_remision')
            ->select('envase_remision.Id_remision','envase_remision.Id_envase','envase_remision.Producto','envase_remision.Cantidad','envase_remision.created_at','envase_remision.Fecha_ingreso')
            ->where('remisiones.Id_cliente', $request->Id_cliente)->orderBy('Id_remision', 'DESC')->get()->toArray();
            return response()->json($Id_cliente);
        }
    }


    public function resumenclientepdf(Request $request, $Id_cliente)
    {
        $check= $request->fechas;
        $fechainicial= $request->fechainicial;
        $fechafinal= $request->fechafinal;
        $cliente=Clientes::findOrFail($Id_cliente);
        if($check=='si'){
             $this->validate($request, [
                'fechainicial' => 'required|date',
                'fechafinal' => 'required|date|after_or_equal:fechainicial',
                ]);
            $reportecliente=DB::table('clientes')
            ->join('remisiones','remisiones.Id_cliente', '=','clientes.Id_cliente')
            ->join('envase_remision','envase_remision.Id_remision', '=','remisiones.Id_remision')
            ->select('envase_remision.Id_remision','envase_remision.Id_envase','envase_remision.Producto','envase_remision.Cantidad','envase_remision.created_at','envase_remision.Fecha_ingreso')
            ->where('remisiones.Id_cliente', $request->Id_cliente)->whereBetween('envase_remision.created_at', [$fechainicial, $fechafinal])->orderBy('Id_remision', 'DESC')->get()->toArray();
            $pdf=PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,"isPhpEnabled", true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('kardes.pdfcliente',compact('reportecliente','cliente'));
            $pdf->getDomPDF()->set_option("enable_php", true);
            return $pdf->stream('kardes-list.pdf');
        }
        else{
            $reportecliente=DB::table('clientes')
            ->join('remisiones','remisiones.Id_cliente', '=','clientes.Id_cliente')
            ->join('envase_remision','envase_remision.Id_remision', '=','remisiones.Id_remision')
            ->select('envase_remision.Id_remision','envase_remision.Id_envase','envase_remision.Producto','envase_remision.Cantidad','envase_remision.created_at','envase_remision.Fecha_ingreso')
            ->where('remisiones.Id_cliente', $request->Id_cliente)->orderBy('Id_remision', 'DESC')->get()->toArray();
            
            $pdf=PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true,"isPhpEnabled", true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('kardes.pdfcliente',compact('reportecliente','cliente'));
            $pdf->getDomPDF()->set_option("enable_php", true);
            return $pdf->stream('kardes-list.pdf');
        }

        
    }
    
}
