           

        <input type="" hidden="" name="id" id="id">
           
           <input type="text" hidden="" name="Id_certificado" id="Id_certificado" class="form-control input-sm" value="{{isset($certificados->Id_certificado)?$certificados->Id_certificado:old('Id_certificado')}}">
                       

                          <label>Envase</label>
                     <div class="form-group   ">
                            <div class=" input-group ">
                              <div class="input-group-append">
                              
                             </div>
                            
                                <select id="Id_envase" name="Id_envase" class="form-control form-control-chosen">
                                  <option value="">Seleccione el envase</option>
                                  @foreach($envase as $item)
                                  <option value="{{$item['Id_envase']}}">{{$item['Id_envase']}}</option>
                                  @endforeach
                                    
                              
                                   </select>

                                
                                {!! $errors->first('Id_envase','<div class="invalid-feedback">:message</div>') !!}

                            </div>
                        </div>
                        <label>Producto</label>
                        <div class="form-group">
                            <div class="input-group">
                              <input type="text" name="Clas_producto" id="Clas_producto" class="form-control " readonly>
                              {{-- <select id="Id_producto" name="Id_producto" class="form-control form-control-chosen">
                                <option value="">Seleccione el producto</option>
                                @foreach($producto as $item)
                                <option value="{{$item['Id_producto']}}">{{$item['Nom_producto']}}</option>
                                @endforeach

                                 </select> --}}

                              
                              {!! $errors->first('Clas_producto','<div class="invalid-feedback">:message</div>') !!}

                            </div>
                        </div>

        <label>Capacidad maxima (Mt3)</label>
        <input type="text" name="Capacidad_max" id="Capacidad_max" class="form-control input-sm" disabled>
       
        <label>Cantidad (Mt3)</label>
        <input type="text" name="Cantidad" id="Cantidad" class="form-control input-sm">
        <input type="text" hidden="" value="1" name="Estado" id="Estado" class="form-control input-sm">

        <div id="last_inserted_id" name="last_inserted_id"></div>


        
