    <div class="card">
      <div class="container">         
        <div class="row justify-content-center">
          <h4>Cilindros en el certificado</h4>
          <div class="col-sm-10">                  
            <table id="tabla" class="table table-hover table-condensed table-bordered tabla display responsive no-wrap" width="100%">
                  <thead>
                      <tr>
                        <th hidden="">Id</th>
                        <th hidden="">Id certificado</th>
                        <th>Nº</th>
                        <th>Id envase</th>
                        <th>Producto</th>
                        <th>Cantidad (Mt3)</th>
                        <th>Acciones</th> 
                      </tr>
                  </thead>
                  <tbody>
                          @php ($i=0)
                            @foreach($datoscilindros as $item)
                            <tr>
                                <td hidden="">{{$item->Id}}</td>
                                <td hidden="">{{$item->Id_certificado}}</td>
                                <td>{{$i=$i+1}}</td>
                                <td class="valorid">{{$item->Id_envase}}</td>
                                <td>{{$item->Clas_producto}}</td>                  
                                <td>{{$item->Cantidad}}</td>
                                <td><button type="submit" class="btn btn-danger elim" id="elim" name="elim" onclick="
                                  eliminar({{$item->Id}});"><i class="fas fa-trash-alt"></i></button>
                                  <button type="submit" hidden="" id="submit" name="submit" onclick="antistock('{{$item->Id_envase}}');">Prueba</button>
                                </td> 
                              </tr>
                            @endforeach 
                    </tbody>
              </table>
          </div>
        </div>                   
      </div>
    </div>  
<script>
  var dato="";
    $(document).ready(function(){ 
      $('#tabla tr').on('click', function(){   
      dato =$(this).find("td").eq(3).html();
    });
  }); 
    var antistock= (function(Id) {    
        var token=$('input[name="_token"]').val();
        var Id_envase =dato;
        $.ajax({
          dataType: 'json',
          type:'put',
          url:"{!!URL::to('antistock')!!}/"+"'Id'",
          data:{Id_envase:Id_envase,_token:token},
          success:function(json){
            console.log('click eliminar'); 
            },
            error: function(e) {
              console.log('click no eliminar'); 
              console.log(e.message);
            }   
          }); 
        });
</script>