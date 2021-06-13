  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
 
<script src="js/jquery.numeric.js" type="text/javascript"></script>
<link rel="stylesheet" href="{{ asset('dist/css/titulo.css')}}">
 <script type="text/javascript">
function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    patron =/[0-9]/;
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
 }
</script>

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
                                value="{{isset($orden->Id_produccion)?$orden->Id_produccion:old('Id_produccion')}}" placeholder="No. Orden" class="form-control {{$errors->has('Id_produccion')?'is-invalid':''}} "maxlength="11" minlength="1" onkeypress="return validarNumero(event)" readonly="">
                               

                         {!! $errors->first('Id_produccion','<div class="invalid-feedback">:message</div>') !!}

                            </div>
                          </div>


                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Fecha de solicitud</label>
                                <input id="Fecha_solicitud" name="Fecha_solicitud" type="date"value="{{isset($orden->Fecha_solicitud)?$orden->Fecha_solicitud:old('Fecha_solicitud')}}"  class="form-control {{$errors->has('Fecha_solicitud')?'is-invalid':''}}"maxlength="40" readonly>
                                
                                {!! $errors->first('Fecha_solicitud','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Nº de lote</label>
                                <input id=" N_lote" name="  N_lote" type="text" 
                                value="{{isset($orden-> N_lote)?$orden->N_lote:old('N_lote')}}" placeholder="No. Lote" class="form-control {{$errors->has('N_lote')?'is-invalid':''}}"maxlength="12">
                               
                                {!! $errors->first('N_lote','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>


                        <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Cantidad de envases</label>
                                <input id=" N_envases" name=" N_envases" type="number" value="{{isset($orden->N_envases)?$orden->N_envases:old('N_envases')}}" placeholder="cantidad de envases" class="form-control {{$errors->has('N_envases')?'is-invalid':''}}"maxlength="3">
                                
                                {!! $errors->first('N_envases','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Cantidad m3</label>
                                <input id="Cantidad_m3" name="Cantidad_m3" type="text" 
                                value="{{isset($orden->Cantidad_m3)?$orden->Cantidad_m3:old('Cantidad_m3')}}" placeholder="Cantidad de producto" class="form-control {{$errors->has('Cantidad_m3')?'is-invalid':''}}"maxlength="12">
                               
                                {!! $errors->first('Cantidad_m3','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>


                         <div class="col-xs-6 col-sm-6 col-md-6">
                               <div class="form-group">
                                <label>Turno</label>
                                <input id="Turno" name="Turno" type="text" 
                                value="{{isset($orden->Turno)?$orden->Turno:old('Tiempo_produccion')}}" placeholder="Turno" class="form-control {{$errors->has('Turno')?'is-invalid':''}}"maxlength="12">
                               
                                {!! $errors->first('Turno','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>




                        <div class="row">
                            
                       <div class="col-xs-12 col-sm-12 col-md-12">
                               <div class="form-group">
                                <label>Fecha de vencimiento</label>
                                <input id="Fecha_vencimiento" name="Fecha_vencimiento" type="text" placeholder="Fecha de vencimiento" onclick="ocultarError();" onfocus="(this.type='date')" onblur="(this.type='text')" 
                                value="{{isset($orden->Fecha_vencimiento)?$orden->Fecha_vencimiento:old('Fecha_vencimiento')}}" class="form-control {{$errors->has('Fecha_vencimiento')?'is-invalid':''}}">
                               
                                {!! $errors->first('Fecha_vencimiento','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        </div>
                        <div style="display: none;">
                        <input id="Estado" name="certi_estado" type="text"  
                                value="0" class="form-control {{$errors->has('certi_estado')?'is-invalid':''}}">
                               
                                {!! $errors->first('certi_estado','<div class="invalid-feedback">:message</div>') !!}

                                </div>

@if($Modo=='editar')
                         
                        <div class="form-group d-flex justify-content-center">
                        
                     <label class="btn btn-primary">
                        <input type="checkbox" autocomplete="off" value="1" id="Estado" name="Estado" class="{{$errors->has('Estado')?'is-invalid':''}}"> Cerrar orden
                      </label>
                               
                                {!! $errors->first('Estado','<div class="invalid-feedback">:message</div>') !!}
                            
                        </div>


@endif


                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <input type="submit" class="btn btn-primary btn-lg" 
                                onclick="return confirm('¿Verifique que estén correctamente diligencia todos los campos?');"  value="{{$Modo=='crear'?'Agregar':'Modificar'}}">

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




