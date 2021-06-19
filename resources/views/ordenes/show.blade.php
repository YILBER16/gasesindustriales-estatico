@extends('layouts.layout')
@section('titulo')
<title>Ver orden</title>
@endsection
@section('script')
<script type="text/javascript">
function mostrarPassword(){
    var cambio = document.getElementById("contrasena");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
  
  $(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
});
</script>

@endsection
@section('contenido')
                <form  class="form-horizontal col-md-12" method="post" enctype="multipart/form-data">
              
              
{{csrf_field()}}
{{method_field('GET')}}

  <fieldset>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
                        <legend class="card-header text-center bg-dark">ORDEN DE PRODUCCIÓN</legend>
                        <div class="card-body">
                        <div class="well">

                         <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Orden de producción</label>
                               
                                <input id="Id_produccion" name="Id_produccion" type="text" 
                                value="{{isset($orden->Id_produccion)?$orden->Id_produccion:old('Id_produccion')}}" placeholder="No. Orden" class="form-control {{$errors->has('Id_produccion')?'is-invalid':''}} "disabled> </div>
                          </div>
                          


                       <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Fecha de solicitud</label>
                             
                                <input id="Fecha_solicitud" name="Fecha_solicitud" type="text" placeholder="Fecha de solicitud" onclick="ocultarError();" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" 
                                value="{{isset($orden->Fecha_solicitud)?$orden->Fecha_solicitud:old('Fecha_solicitud')}}"  class="form-control {{$errors->has('Fecha_solicitud')?'is-invalid':''}}"disabled>
                            </div>
                        </div>
                    </div>


                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Nº de lote</label>
                               
                                <input id=" N_lote" name="  N_lote" type="text" 
                                value="{{isset($orden-> N_lote)?$orden->N_lote:old('N_lote')}}{{old(' N_lote')}}" class="form-control {{$errors->has('  N_lote')?'is-invalid':''}}"disabled>
                                </div>
                        </div>


                        <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Cantidad de envases</label>
                              
                                <input id=" N_envases" name=" N_envases" type="number" value="{{isset($orden->N_envases)?$orden->N_envases:old('N_envases')}}{{old('N_envases')}}"  class="form-control {{$errors->has('  N_envases')?'is-invalid':''}}"disabled>
                            </div>
                        </div>
                         </div>


                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Cantidad m3</label>
                               
                                <input id="Cantidad_m3" name="Cantidad_m3" type="number" 
                                value="{{isset($orden->Cantidad_m3)?$orden->Cantidad_m3:old('Cantidad_m3')}}{{old('Cantidad_m3')}}" class="form-control {{$errors->has('Cantidad_m3')?'is-invalid':''}}" disabled> 
                            </div>
                        </div>


                        <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Turno</label>
                               <input id="Turno" name="Turno" type="text" 
                                value="{{isset($orden->Turno)?$orden->Turno:old('Tiempo_produccion')}}{{old('Turno')}}" class="form-control {{$errors->has('Turno')?'is-invalid':''}}"disabled>
                            </div>
                        </div>
                         </div>


                         <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Tiempo de producción</label>
                                  <input id="Tiempo_produccion" name="Tiempo_produccion" type="text" 
                                value="{{isset($orden->Tiempo_produccion)?$orden->Tiempo_produccion:old('Tiempo_produccion')}}{{old('Tiempo_produccion')}}" placeholder="Tiempo de producción" class="form-control {{$errors->has('Tiempo_produccion')?'is-invalid':''}}" disabled>   
                            </div>
                        </div>


                         <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                 <label>Fecha de vencimiento</label>
                                <input id="Fecha_vencimiento" name="Fecha_vencimiento" type="text"
                                value="{{isset($orden->Fecha_vencimiento)?$orden->Fecha_vencimiento:old('Fecha_vencimiento')}}{{old('Fecha_vencimiento')}}" class="form-control {{$errors->has('Fecha_vencimiento')?'is-invalid':''}}"disabled>
                        </div>
                        </div>
                         </div>
                        <div class="row">
                       <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                              <label>Fecha y hora inicial</label>
                               
                                <input id="Fecha_inicial" name="Fecha_inicial" type="text" 
                                value="{{isset($orden->created_at)?$orden->created_at:old('created_at')}}" class="form-control {{$errors->has('created_at')?'is-invalid':''}}" disabled>
                            
                        </div>

                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">

                                <label>Fecha y hora final</label>
                               
                                <input id="Fecha_final" name="Fecha_final" type="text" 
                                value="{{isset($orden->updated_at)?$orden->updated_at:old('updated_at')}}" class="form-control {{$errors->has('updated_at')?'is-invalid':''}}" disabled>
                                   
                              </div>
                          </div>

                        </div>
                        <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-12">
                               <div class="form-group">
                        <label>Tiempo de producción</label>
                         <input id="aa" name="aa" type="text" 
                                value="{{isset($date_diff)?$date_diff:old('date_diff')}}{{old('date_diff')}}" class="form-control {{$errors->has('date_diff')?'is-invalid':''}}" disabled>
                                  </div>
                                  </div>
                                  </div> 
                              </div>
                       


                    <div class="form-group">
                        <div class="col-md-12 text-center">
                        <button type="button" class="btn btn-danger btn-lg" onclick="window.location='{{ URL::previous() }}'">Cancelar</button>


                      </div>
                    </div>
                  </div>
               </div>
            </div>
          </div>
        </div>
   </div>
</fieldset>
                 
                   
                </form>

@endsection