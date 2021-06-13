

  <fieldset>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">

                        <legend class="card-header text-center bg-dark">CERTIFICADO DE PRODUCCIÓN</legend>
                        &nbsp
                        
                        <form id="idcerti_form" action="" method="post">
                          @csrf
                          <input type="text" hidden="" id="id" name="id">
   
                      
                          <div class="row justify-content-center">
                            <div class="form-group col-md-4">
                              <label class="">Orden de producción</label>
                              
                                   <input id="Id_produccion" name="Id_produccion" class="form-control Id_produccion" value="{{isset($certificados->Id_produccion)?$certificados->Id_produccion:old('Id_produccion')}}" disabled="">

                                
                                {!! $errors->first('Id_produccion','<div class="invalid-feedback">:message</div>') !!}

                            </div>
                            <div class="form-group col-md-5">
                              <label class="">Clase de producto</label>
                                   <input id="Id_producto" name="Id_produto" class="form-control Id_producto" value="{{isset($certificados->producto->Nom_producto)?$certificados->producto->Nom_producto:old('Id_producto')}}" disabled="">

                                
                                {!! $errors->first('Id_producto','<div class="invalid-feedback">:message</div>') !!}

                            </div>
                        </div>


                        
                        <div class="row justify-content-center">
                              <div class="form-group col-md-3">
                                  <label class="">Fecha de solicitud</label>
                             <input id="f_solicitud" name="f_solicitud" type="text" value=""class="form-control" disabled="disabled" >
                             </div>
                                 <div class="form-group col-md-3">
                                  <label>Nº Lote</label>
                                <input id="lote" name="lote" type="text" value=""class="form-control lote" disabled="disabled" >
                                 </div>
                                 <div class="form-group col-md-3">
                                  <label>Cantidad m3</label>
                                <input id="cantidadm" name="cantidadm" type="text" value=""class="form-control" disabled="disabled" >
                                 </div>
                        </div>
                        <div class="row justify-content-center">
                              <div class="form-group col-md-3">
                                  <label class="">Fecha inicial</label>
                             <input id="f_inicial" name="f_inicial" type="text" value=""class="form-control" disabled="disabled" >
                             </div>
                                 <div class="form-group col-md-3">
                                  <label>Fecha final</label>
                                <input id="f_final" name="f_final" type="text" value=""class="form-control lote" disabled="disabled" >
                                 </div>
                                 <div class="form-group col-md-3">
                                  <label>Fecha de vencimiento</label>
                                <input id="f_vencimiento" name="f_vencimiento" type="text" value=""class="form-control" disabled="disabled" >
                                 </div>
                        </div>
                        <div class="row justify-content-center">
                          
                          <div class="form-group col-md-9">     
                            <label>Empleado</label>               
                             <input id="Nom_empleado" name="Nom_empleado" type="text" class="form-control" value="{{$certificados->Nom_empleado}}" disabled="">                         
                                {!! $errors->first('Nom_empleado','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                        </div>
                        
                        <div class="row justify-content-center">
                              <div class="form-group col-md-3">
                                  <label class="">Capacidad M3</label>
                             <input id="Capacidad" name="Capacidad" type="text" value="{{isset($certificados->Capacidad)?$certificados->Capacidad:old('Capacidad')}}"class="form-control"  disabled="disabled">
                             </div>
                                 <div class="form-group col-md-3">
                                  <label>Pureza</label>
                                <input id="Pureza" name="Pureza" type="text" value="{{isset($certificados->Pureza)?$certificados->Pureza:old('Pureza')}}"class="form-control lote" disabled="disabled">
                                 </div>
                                 <div class="form-group col-md-3">
                                  <label>Presion</label>
                                <input id="Presion" name="Presion" type="text" value="{{isset($certificados->Presion)?$certificados->Presion:old('Presion')}}"class="form-control" disabled="disabled">
                                 </div>
                        </div>
                        <div class="row justify-content-center">
                              <div class="form-group col-md-9">
                             <input id="Observaciones" name="Observaciones" type="text" value="{{isset($certificados->Observaciones)?$certificados->Observaciones:old('Observaciones')}}"class="form-control" placeholder="Observaciones"  disabled="disabled">
                             </div>
                        </div>

                       
                       </form>
                        </div>
                        </div>
                        </div>
                        
                         </div>

                       
</fieldset>

