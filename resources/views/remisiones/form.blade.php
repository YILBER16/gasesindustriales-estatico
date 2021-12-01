      <label>Envase</label>
      <div class="form-group">
         <div class=" input-group">            
            <select id="Id_envase" name="Id_envase" class="form-control form-control-chosen">
               <option value="">Seleccione el envase</option>
               @foreach($envases as $item)
               <option value="{{$item['Id_envase']}}">{{$item['Id_envase']}}</option>
               @endforeach
            </select>
               {!! $errors->first('Id_envase','<div class="invalid-feedback">:message</div>') !!}
         </div>
      </div>
         <input class="form-control" type="text" name="Id_remision_cilindro" id="Id_remision_cilindro" hidden>
         {!!$errors->first('Id_remision', '<span class=error>:message</span>')!!}

         <label>Certificado</label>
         <input class="form-control" type="text" name="Id_certificado_cilindro" id="Id_certificado_cilindro" readonly>
         {!!$errors->first('Id_certificado', '<span class=error>:message</span>')!!}

         <label>Producto</label>
         <input class="form-control" type="text" name="Producto_cilindro" id="Producto_cilindro" readonly>
         {!!$errors->first('Producto', '<span class=error>:message</span>')!!}

         <label>Cantidad</label>
         <input class="form-control" type="text" name="Cantidad_cilindro" id="Cantidad_cilindro" readonly>
         {!!$errors->first('Cantidad', '<span class=error>:message</span>')!!}

        
