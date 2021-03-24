<div class="container">
<table class="table text-center tablaa" id="tablaa">
            <thead >
              <tr class="">
                <td hidden="">Id</td>
                <td>Id envase</td>
                <td>Nº remision</td>
                <td>Producto</td>
                <td>Cantidad</td>
                <td>Fecha remision</td>
                <td>Acciones</td>
              </tr>
            </thead>
            <tbody>
              @foreach($datos2 as $item)
              <tr>
                <td hidden="">{{$item->Id}}</td>
                <td>{{$item->Id_envase}}</td>
                <td>{{$item->Id_remision}}</td>
                <td>{{$item->Producto}}</td>
                <td>{{$item->Cantidad}}</td>
                <td>{{$item->Fecha_remision}}</td>
                <td>

                  <button type="submit" class="btn btn-primary" id="elim" name="elim" onclick="ver_datos({{$item->Id}});"data-toggle="modal" data-target="#modalremisionedicion"><i class="fas fa-arrow-right" ></i></button>
                  <button type="submit" hidden="" id="submit" name="submit" onclick="antistockinventario('{{$item->Id_envase}}');stockinventario('{{$item->Id_envase}}');">Prueba</button>
                </td>
              </tr>
            
              
              @endforeach
            </tbody>
          </table>

          <input type="text" hidden="" name="txtNombre" id="txtNombre" value=""> 
          <input type="text" hidden="" name="txtNombreid" id="txtNombreid" value=""> 
</div>
  

<script >
  $(document).ready(function(){
 $('#tablaa tr').on('click', function(){
 var dato=$(this).find("td").eq(1).html(); 
  var dato2=$(this).find("td").eq(0).html(); 
  $('#txtNombre').val(dato);
  $('#txtNombreid').val(dato2);
});
  });
    
</script>