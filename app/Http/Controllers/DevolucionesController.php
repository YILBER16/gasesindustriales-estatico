<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Carbon\Carbon;
use App\Clientes;
use App\Remisiones;
use App\Devoluciones;
use App\Envases;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use App\Http\Requests\ConsultafechasRequest;

class DevolucionesController extends Controller
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
  
            return Datatables::of(Devoluciones::with('cliente')->get())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $btn = '<a type="button" class="showbutton btn btn-primary" href="/devoluciones/'.$data->id.'"><i class="fas fa-eye"></i></a>';

                        // $btn .= '&nbsp;';
                        // $btn .= '<a type="button" class="pdfbutton btn btn-danger" href="/certificados.pdfindi/'.$data->Id_certificado.'"><i class="fas fa-file-pdf"></i></a>';
              
                     
                                        return $btn;
                                })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
        return view('devoluciones.index');

    }

    public function show(Request $request, $id)
    {
       $devolucion=Devoluciones::findOrFail($id);

       return view('devoluciones.show',compact('devolucion'));
       
    }
   

      public function informedevoluciones(ConsultafechasRequest $request)
    {
        $fecha1= $request->fechainicial;
        $fecha2= $request->fechafinal;
       $devoluciones= Devoluciones::with('cliente')->whereBetween('created_at', [$fecha1, $fecha2])->get();
      
       $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('letter','landscape')->loadView('devoluciones.pdf',compact('devoluciones'));
        return $pdf->stream('devoluciones-list.pdf');
    }
}
