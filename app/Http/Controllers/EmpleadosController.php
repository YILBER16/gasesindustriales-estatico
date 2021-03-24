<?php

namespace App\Http\Controllers;
use App\Empleados;
use Illuminate\Http\Request;
use App\Http\Requests\CreateempleadosRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\EmpleadosImport;
use DataTables;



class EmpleadosController extends Controller
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
  
            return Datatables::of(Empleados::all())
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
            $btn = '<a type="button" class="editbutton btn btn-primary" href="/empleados/'.$data->Id_empleado.'/edit"><i class="fas fa-edit"></i></a>';
            $btn .= '&nbsp;';
            $btn .= '<button  class="deletebutton btn btn-danger"  data-toggle="modal" data-target="#deletemodal" data-info="'.$data->Id_empleado.';'.$data->Nom_empleado.'"><i class="fas fa-trash-alt"></i></button>';
          
         
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    
        }
       return view('empleados.index');

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateempleadosRequest $request )
    {
        //

        //$this->validate($request,['Id_empleado'=>'required']);

        $datosEmpleado=request()->all();

        $datosEmpleado=request()->except('_token');


        Empleados::insert($datosEmpleado);


     
       // Session::flash('flash_message','Guardado con exito');
        return redirect('empleados')->with('alert', 'Registrado con exito');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_empleado)
    {
        $empleado=Empleados::findOrFail($Id_empleado);

        return view('empleados.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    

    public function update(Request $request, $Id_empleado)
    {
        //
        $datosEmpleado=request()->except(['_token','_method','_deleted_at']);
        Empleados::where('Id_empleado','=',$Id_empleado)->update($datosEmpleado);
        
        //$input = $request->only('estado');
        //Empleados::where('Id_empleado','=',$Id_empleado)->update($input);
         
        return redirect('empleados')->with('alertedit', 'Modificado con exito');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $Id_empleado)
    {
        //
        // $empleado=Empleados::find($Id_empleado);
        // $empleado->delete();
        // return redirect('empleados')->with('alertdeleted', 'Eliminado con exito');
    }
    public function deleteDate(Request $request)
    {
        $data=Empleados::find($request->Id_empleado)->delete();
        return response()->json();
    }
    public function exportpdf()
    {
        
        $empleadospdf=Empleados::all();
        $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('empleados.pdf',compact('empleadospdf'));
        return $pdf->stream('empleados-list.pdf');

    }
    public function importexcel(Request $request){
        $file=$request->file('file');
        Excel::import(new EmpleadosImport, $file);
        return back()->with('alert', 'Registrado con exito');

    }
}
