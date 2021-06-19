@extends('layouts.layout')
@section('titulo')
<title>Detalles</title>
@endsection

@section('contenido')
             
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
          
          <legend class="card-header text-center bg-dark">Detalles de devolución</legend>
          <div class="card-body">
              
                <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                      <div class="form-group" >
                      <label>Nº remisión</label>
                          <input type="text" class="form-control" id="dremision" name="dremision"  value="{{$devolucion->Id_remision}}" readonly>
                      </div>  
                  </div>     
                    <div class="col-xs-6 col-sm-6 col-md-6">
                       <div class="form-group">
                       <label>Fecha devolución </label>
                          <input type="text" class="form-control" id="Fecha_devolucion" name="Fecha_devolucion"  value="{{$devolucion->Fecha_devolucion}}" readonly>
                       </div>
                    </div>
               </div>

                <div class="row">
                        <div class="form-group col-md-6">
                        <label>Nit cliente</label>
                          <input type="text" class="form-control input-sm" id="d_cliente" name="d_cliente" value="{{$devolucion->Id_cliente}}" readonly>
                        </div>
                         <div class="form-group col-md-6">
                         <label>Cliente</label>
                          <input type="text" class="form-control input-sm" id="n_cliente" name="n_cliente" value="{{$devolucion->cliente->Nom_cliente}}"readonly>
                         </div>
                 </div>

                  <div class="row ">
                        <div class="form-group col-md-6">
                        <label>CC empleado</label>
                          <input type="text" class="form-control input-sm" id="d_empleado" name="d_empleado" value="{{$devolucion->Id_empleado}}" readonly>
                         </div>
                         <div class="form-group col-md-6">
                         <label>Empleado</label>
                          <input type="text" class="form-control input-sm" id="n_empleado" name="n_empleado"value="{{$devolucion->Nom_empleado}}" readonly>
                         </div>
                  </div>
                      
                 <div class="row">
                        <div class="form-group col-md-6">
                        <label>Producto</label>
                          <input type="text" class="form-control input-sm" id="d_producto" name="d_producto" value="{{$devolucion->Producto}}"readonly>
                        </div>
                         <div class="form-group col-md-6">
                         <label>Cantidad producto</label>
                          <input type="text" class="form-control input-sm" id="c_producto" name="c_producto" value="{{$devolucion->Cantidad}}" readonly>
                        </div>
                </div>
                <div class="row">
                      <div class="form-group col-md-12">
                      <label>Motivo de la devolución</label>
                            <textarea name="textarea" rows="5" cols="20" class="form-control input-sm" id="descripcion" name="descripcion" readonly>{{$devolucion->Descripcion}}</textarea>
                      </div>
               </div>
                <div class="form-group">
                      <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-danger btn-lg" onclick="window.location='{{ URL::previous() }}'">Regresar</button>
                      </div>
                </div>
          </div>  
      </div>           
    </div> 
 </div> 

@endsection