        <input type="text" hidden="" id="id1" name="id1">
        <input type="text" hidden=""  id="Idc" name="Idc">
        <input type="text" name="" hidden="" id="Id_certificadou" class="form-control input-sm">
        <label>Id envase</label>
        <input type="text" name="" id="Id_envaseu" class="form-control input-sm" disabled="disabled">
        <label>Id producto</label>
        <select id="Id_productou" name="Id_productou" class="form-control ">
        @foreach($producto as $item)
        <option value="{{$item['Id_producto']}}">{{$item['Nom_producto']}}</option>
        @endforeach
        </select>
        <label>Cantidad</label>
        <input type="text" name="" id="Cantidadu" class="form-control input-sm">


