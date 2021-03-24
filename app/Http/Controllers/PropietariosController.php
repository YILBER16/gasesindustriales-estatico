<?php

namespace App\Http\Controllers;

use App\Propietarios;
use Illuminate\Http\Request;
use App\Http\Requests\CreatepropietariosRequest;
use Illuminate\Support\Facades\Gate;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Options;
use Maatwebsite\Excel\Facades\Excel;
use App\imports\PropietariosImport;
use DataTables;

class PropietariosController extends Controller
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
        if (Gate::denies('isAdmin')) {
    abort(403);
};
if ($request->ajax()) {
  
    return Datatables::of(Propietarios::all())
            ->addIndexColumn()
            ->addColumn('action', function($data){
    $btn = '<a type="button" class="editbutton btn btn-primary" href="/propietarios/'.$data->Id_propietario.'/edit"><i class="fas fa-edit"></i></a>';
    $btn .= '&nbsp;';
    $btn .= '<button  class="deletebutton btn btn-danger"  data-toggle="modal" data-target="#deletemodal" data-info="'.$data->Id_propietario.';'.$data->Nom_propietario.'"><i class="fas fa-trash-alt"></i></button>';
  
 
                    return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
            
                    }
        return view('propietarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propietarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatepropietariosRequest $request)
    {
     
        $datosPropietario=request()->all();

        $datosPropietario=request()->except('_token');
       

       Propietarios::insert($datosPropietario);
       
  
       // Session::flash('flash_message','Guardado con exito');
        return redirect('propietarios')->with('alert', 'Registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Propietarios $propietario)
    {
        
       return view('propietarios.show', ['propietarios'=>$propietario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($Id_propietario)
    {
          $propietario=Propietarios::findOrFail($Id_propietario);

        return view('propietarios.edit',compact('propietario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $Id_propietario)
    {
        if (Gate::denies('isAdmin')) {
    abort(403);
};

      $datosPropietario=request()->except(['_token','_method']);
       Propietarios::where('Id_propietario','=',$Id_propietario)->update($datosPropietario);
        
        return redirect('propietarios')->with('alertedit', 'Modificado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($Id_propietario)
    {
        // $propietario=Propietarios::find($Id_propietario);
        // $propietario->delete();
        // return redirect('propietarios')->with('alertdeleted', 'Eliminado con exito');
    }
    public function deleteDate(Request $request)
    {
        $data=Propietarios::find($request->Id_propietario)->delete();
        return response()->json();
    }
    public function exportpdf()
    {
        
        $propietariospdf=Propietarios::all();
        $pdf= PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper(array(0, 0, 622.00, 792.00))->loadView('propietarios.pdf',compact('propietariospdf'));
        return $pdf->stream('propietarios-list.pdf');

    }
    public function importexcel(Request $request){
        $file=$request->file('file');
        Excel::import(new PropietariosImport, $file);
        return back()->with('alert', 'Registrado con exito');
    }
}
