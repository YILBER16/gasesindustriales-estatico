    <input type="text"  hidden="" name="Id_certificado" id="Id_certificado" class="form-control  input-sm" value="">
        <label>Envase</label>
            <div class="form-group   ">
                <div class=" input-group ">                           
                    <select id="Id_envase" name="Id_envase" class="form-control form-control-chosen">
                        <!-- <option value="">Seleccione el producto</option> -->
                        <!-- @foreach($envases as $item)
                        <option value="{{$item['Id_envase']}}">{{$item['Id_envase']}}</option>
                        @endforeach -->
                    </select>
                </div>
            </div>
        <label>Producto</label>
        <div class="form-group">
            <div class=" input-group ">
                    <select id="Producto" name="Producto" class="Producto form-control form-control-chosen">
                        <option value="">Seleccione el producto</option>
                        @foreach($producto as $item)
                        <option value="{{$item['Nom_producto']}}">{{$item['Nom_producto']}}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <label>Capacidad maxima (Mt3)</label>
        <input type="text" name="Capacidad_max" id="Capacidad_max" class="form-control input-sm" disabled>
        <label>Cantidad (Mt3)</label>
        <input type="number" name="Cantidad" id="Cantidad" class="form-control input-sm">

        
