          <legend class="card-header text-center bg-dark">CERTIFICADO DE PRODUCCIÓN</legend>
            <input type="text"  id="Id_certificado" name="Id_certificado" value="{{$resultado}}" hidden>
                <div class="row justify-content-center">
                            <div class="form-group col-md-4">
                                <label class="">Orden de producción</label>
                                <select id="Id_produccion" name="Id_produccion" class="form-control form-control-chosen Id_produccion">
                                  <option value="">Seleccione orden de producción</option>
                                  @foreach($produccion as $item)
                                  <option value="{{$item['Id_produccion']}}">{{$item['Id_produccion']}}</option>
                                  @endforeach
                                   </select>
                             </div>
                            <div class="form-group col-md-5">
                                <label class="">Clase de producto</label>
                                <select id="Id_producto" name="Id_producto" class="form-control form-control-chosen Id_producto">
                                  <option value="">Seleccione producto</option>
                                  @foreach($producto as $item)
                                  <option value="{{$item['Id_producto']}}">{{$item['Nom_producto']}}</option>
                                  @endforeach
                                   </select>
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
                  <div class="form-group col-md-4">     
                      <label>Cantidad de envases</label>               
                      <input id="cant_envases" name="cant_envases" type="text" class="form-control" value="" disabled="disabled">                         
                  </div>
                  <div class="form-group col-md-5">     
                      <label>Empleado</label>               
                      <input id="Nom_empleado" name="Nom_empleado" type="text" class="form-control" value="{{Auth::user()->name}}" readonly>                         
                        {!! $errors->first('Nom_empleado','<div class="invalid-feedback">:message</div>') !!}
                  </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-3">
                        <label class="">Capacidad M3</label>
                        <input id="Capacidad" name="Capacidad" type="text" value=""class="form-control"  >
                    </div>
                    <div class="form-group col-md-3">
                          <label>Pureza</label>
                          <input id="Pureza" name="Pureza" type="text" value=""class="form-control" maxlength="20">
                      </div>
                    <div class="form-group col-md-3">
                          <label>Presión</label>
                          <input id="Presion" name="Presion" type="text" value=""class="form-control" maxlength="20">
                     </div>
                </div>
                <div class="row justify-content-center">
                    <div class="form-group col-md-9">
                        <label>Observaciones</label>
                      <input id="Observaciones" name="Observaciones" type="text" value=""class="form-control" placeholder="Observaciones"  maxlength="200">
                    </div>
                </div>
