

  <fieldset>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
             <legend class="card-header text-center bg-dark">REMISIÓN</legend>
             @csrf
                        
           <form id="idremision_form" action="" method="post">          
             <input type="text" hidden="" id="id2" name="id2">
                    <div class="row justify-content-center">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label class="">Empresa</label>
                                <input id="empresa" name="empresa" type="text" value="{{isset($remisiones->empresa)?$remisiones->empresa:old('empresa')}}"class="form-control" disabled=""  >
                            </div>
                         </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                <label class="">Nº remisión</label>
                                <input id="Id_remision" name="Id_remision" type="text" value="{{isset($remisiones->Id_remision)?$remisiones->Id_remision:old('Id_remision')}}"class="form-control" disabled=""  >
                            </div>
                         </div>
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label>Fecha</label>
                                <input id="Fecha_remision" name="Fecha_remision" type="text" value="{{isset($remisiones->Fecha_remision)?$remisiones->Fecha_remision:old('Fecha_remision')}}"class="form-control lote" readonly="" >
                            </div>
                         </div>
                     </div>   
                  <div class="row justify-content-center">
                        <div class="col-xs-5 col-sm-5 col-md-5">
                              <div class="form-group">
                                <label class="">Cliente</label>
                                    <select id="Id_cliente" name="Id_cliente" class="form-control form-control-chosen Id_cliente" disabled>
                                    <option value="{{isset($remisiones->Id_cliente)?$remisiones->Id_cliente:old('Id_cliente')}}">{{isset($remisiones->cliente->Nom_cliente)?$remisiones->cliente->Nom_cliente:old('Id_cliente')}}</option>
                                    @foreach($clientes as $item)
                                    <option value="{{$item['Id_cliente']}}">{{$item['Nom_cliente']}}</option>
                                    @endforeach
                                    </select>
                                {!! $errors->first('Id_cliente','<div class="invalid-feedback">:message</div>') !!}
                               </div>
                           </div>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <div class="form-group">
                              <label class="">Nit o CC</label>
                              <input id="Nom_cliente" name="Nom_cliente" type="text" value=""class="form-control" disabled="">
                            </div>
                        </div>
                   </div>
                  <div class="row justify-content-center">
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                                  <label class="">Direccion</label>
                                  <input id="Dir_cliente" name="Dir_cliente" type="text" value=""class="form-control"  disabled="">
                             </div>
                         </div>
                         <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                  <label>Telefono</label>
                                <input id="Tel_cliente" name="Tel_cliente" type="text" value=""class="form-control lote" disabled="">
                             </div>
                           </div>
                          <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                  <label>E-mail</label>
                                  <input id="Cor_cliente" name="Cor_cliente" type="text" value=""class="form-control" disabled="" >
                              </div>
                            </div>
                   </div>
                  <div class="row justify-content-center">
                      <div class="col-xs-5 col-sm-5 col-md-5">
                            <div class="form-group">
                                  <label class="">Empleado</label>
                                  <input id="Nom_empleado" name="Nom_empleado" type="text" class="form-control" value="{{Auth::user()->name}}" readonly>                         
                                  {!! $errors->first('Nom_empleado','<div class="invalid-feedback">:message</div>') !!}
                            </div>
                       </div>
                      <div class="col-xs-5 col-sm-5 col-md-5">
                          <div class="form-group">
                                  <label class="">Nit o CC</label>
                                  <input id="id_empleado" name="id_empleado" type="text" class="form-control" value="{{Auth::user()->id}}" readonly></div>
                           </div>
                       </div>
                       <div class="row justify-content-center">
                            <div class="col-xs-10 col-sm-10 col-md-10">
                                <div class="form-group">
                                        <label class="">Observaciones</label>
                                        <input id="Observaciones" name="Observaciones" type="text" class="form-control" value="{{isset($remisiones->Observaciones)?$remisiones->Observaciones:old('Observaciones')}}" readonly>                          
                                </div>
                            </div>
                        </div>
              </form>
        </div>
     </div>
  </div>
                        
 </div>

                       
</fieldset>

