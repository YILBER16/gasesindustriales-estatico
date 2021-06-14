

  <fieldset>
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">

                        <legend class="card-header text-center bg-dark">REMISIÓN</legend>
                        &nbsp
                        
                        <form id="idremision_form" action="" method="post">
                          @csrf
                          <input type="text" hidden="" id="id2" name="id2">
                            
                            <div class="row justify-content-center">
                              <div class="form-group col-md-5">
                                  <label class="">Nº remisión</label>
                             <input id="Id_remision" name="Id_remision" type="text" value="{{isset($ultimoAgregadosumado)?$ultimoAgregadosumado:old('Id_remision')}}"class="form-control" disabled=""  >
                             </div>
                                 <div class="form-group col-md-5">
                                  <label>Fecha</label>
                                <input id="Fecha_remision" name="Fecha_remision" type="date" value=""class="form-control lote" >
                                 </div>
                        </div>

                        
                        <div class="row justify-content-center">
                            <div class="form-group col-md-5">
                              <label class="">Cliente</label>
                                <select id="Id_cliente" name="Id_cliente" class="form-control form-control-chosen Id_cliente">
                                  <option value="">Seleccione el cliente</option>
                                  @foreach($clientes as $item)
                                  <option value="{{$item['Id_cliente']}}">{{$item['Nom_cliente']}}</option>
                                  @endforeach

                                   </select>

                                
                                {!! $errors->first('Id_cliente','<div class="invalid-feedback">:message</div>') !!}
                                 </div>
                                 <div class="form-group col-md-5">
                            <label class="">Nit o CC</label>
                        <input id="Nom_cliente" name="Nom_cliente" type="text" value=""class="form-control" disabled="">
                          </div>
                          </div>
                        <div class="row justify-content-center">
                              <div class="form-group col-md-4">
                                  <label class="">Direccion</label>
                             <input id="Dir_cliente" name="Dir_cliente" type="text" value=""class="form-control"  disabled="">
                             </div>
                             &nbsp
                                 <div class="form-group col-md-3">
                                  <label>Telefono</label>
                                <input id="Tel_cliente" name="Tel_cliente" type="text" value=""class="form-control lote" disabled="">
                                 </div>
                                 &nbsp
                                 <div class="form-group col-md-3">
                                  <label>E-mail</label>
                                <input id="Cor_cliente" name="Cor_cliente" type="text" value=""class="form-control" disabled="" >
                                 </div>
                        </div>
                      <div class="row justify-content-center">
                            <div class="form-group col-md-5">

                              <label class="">Empleado</label>
                              <input id="Nom_empleado" name="Nom_empleado" type="text" class="form-control" value="{{Auth::user()->name}}" readonly>                         
                              {!! $errors->first('Nom_empleado','<div class="invalid-feedback">:message</div>') !!}
                                 </div>

                                 <div class="form-group col-md-5">
                            <label class="">Nit o CC</label>
                          <input id="Id_empleado" name="Id_empleado" type="text" class="form-control" value="{{Auth::user()->cedula}}" readonly>                          </div>

                          </div>
                       <div class="row justify-content-center">
                              <div class="form-group col-md-10">
                        <button type="submit"  class="btn btn-primary btn-lg btnenviar "><i class="fas fa-plus"></i> Crear</button>
                        </div>
                        </div>
                       </form>
                        </div>
                        </div>
                        </div>
                        
                         </div>

                       
</fieldset>

