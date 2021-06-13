           

        <input type="" hidden="" name="id" id="id">
           
           <input type="text" name="Id_remision1" id="Id_remision1" class="form-control input-sm" value="{{isset($remisiones->Id_remision)?$remisiones->Id_remision:old('Id_remision')}}" hidden="">
                       

                          <label>Envase</label>
                     <div class="form-group">
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
        <input type="text" name="Clas_producto" id="Clas_producto" value="" class="form-control input-sm"readonly>
        <label>Cantidad</label>
        <input type="text" name="Cantidad" id="Cantidad" value="" class="form-control input-sm"readonly>


        <div id="last_inserted_id" name="last_inserted_id"></div>


        
