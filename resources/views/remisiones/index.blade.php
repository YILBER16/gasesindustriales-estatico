@extends('welcome')
@extends('layouts.layout')
@section('titulo')
<title>Certificados</title>
@endsection
@section('script')

@endsection
@section('contenido')
  @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
          
         <div class="container ">

            <div class="row">
          
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner" style="height:auto;">
                <h3>{{$aire}}</h3>

                <p>Aire</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
        
          <!-- ./col -->
          <div class="col-lg-2 col-6" >
            <!-- small box -->
            <div class="small-box bg-info" >
              <div class="inner">
                <h3>{{$helio}}</h3>

                <p>Helio</p>
              </div>
              <div class="icon">
              <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
          <div class="col-lg-2 col-6" >
            <!-- small box -->
            <div class="small-box bg-info" >
              <div class="inner">
                <h3>{{$nitrogeno}}</h3>

                <p>Nitrogeno</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$argon}}</h3>

                <p>Argon</p>
              </div>
              <div class="icon">
              <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner" style="height:auto;">
                <h3>{{$acetileno}}</h3>

                <p>Acetileno</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-info" >
              <div class="inner">
                <h3>{{$co2}}</h3>

                <p style="">CO2</p>
              </div>
              <div class="icon">
                <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
        </div>

             <div class="row">
            <div class="col-lg-4 col-6" >
            <!-- small box -->
            <div class="small-box bg-dark" >
              <div class="inner">
                <h3>{{$mezclas}}</h3>

                <p>Mezclas</p>
              </div>
              <div class="icon">
               <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
              <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner">
                <h3>{{$oxigeno_m}}</h3>

                <p>Oxigeno medicinal</p>
              </div>
              <div class="icon">
               <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
            <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-dark" >
              <div class="inner">
                <h3>{{$oxigeno_i}}</h3>

                <p style="">Oxigeno industrial</p>
              </div>
              <div class="icon">
               <i class="fas fa-tasks"></i>
              </div>

            </div>
          </div>
          
          <!-- ./col -->
        </div>
           <h4 class="titulo center" ><b>REMISIONES</b> </h4>

          <table class=" table table-striped  table-hover table-curved text-center table2" id="miTabla">
            <thead >
              <tr class="">
                <th>Nº remisión</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Estado</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              
              @foreach($datos as $item)
              <tr>

                <td id="n_remision">
            
               {{$item->Id_remision}}
              </td>
                
                <td>{{$item->Fecha_remision}}</td>
                <td>{{$item->Nom_cliente}}</td>
                <td>{{$item->Nom_empleado}}</td>
                <td>{{$item->Estado_remision==0?"Abierta":"Cerrada"}}</td>
                <td>
                <form method="post" action="{{url('/remisiones/'.$item->Id_remision)}}">
                    {{csrf_field()}}
                    {{ method_field('DELETE')}}
                    @if($item->Estado_remision==0 )
                     <a href="{{ url('/remisiones/'.$item->Id_remision).'/edit'}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                       <button type="submit" onclick="return confirm('¿Desea borrar esta remisión?');" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                       @else

                       <a href="{{url('/remisiones.pdfindi/'.$item->Id_remision)}} " type="button" class="btn btn-danger btn-lg" ><i class="fas fa-file-pdf"></i> </a>
@endif
                  </form>
                  

                </td>
              </tr>
           
              
              @endforeach
            </tbody>
          </table>
         
                 
          @section('cuerpo_modal_remision')

                @csrf
                 
               @include('remisiones.formentrada')
                 @section('pie_modal_remision')
                 <button type="submit" class="btn btn-danger" data-dismiss="modal" data-dismiss="modal">Cerrar</button>
                 @endsection
               
               @endsection

               @section('cuerpo_modal_remision_edicion')

               @include('remisiones.formentradaedicion')

               @section('pie_modal_remision_edicion')
                 <button type="submit" id="btn_recibir" class="btn btn-warning btn_recibir" data-dismiss="modal" data-dismiss="modal">Recibir</button>
                 @endsection

               @endsection
          

           <div class="modal-footer">
         <button id="prueba" data-toggle="modal" data-target="#modalremision" class="btn btn-primary">RECIBIR</button>
        <a href="{{url('remisiones/create')}} " type="button" class="btn btn-success" >Crear remision</a>
        
</div>
</div>

<script type="text/javascript">

   function zfill(number, width) {
    var numberOutput = Math.abs(number); /* Valor absoluto del número */
    var length = number.toString().length; /* Largo del número */ 
    var zero = "0"; /* String de cero */  
    
    if (width <= length) {
        if (number < 0) {
             return ("-" + numberOutput.toString()); 
        } else {
             return numberOutput.toString(); 
        }
    } else {
        if (number < 0) {
            return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
        } else {
            return ((zero.repeat(width - length)) + numberOutput.toString()); 
        }
    }
}
$(document).ready(function(){
 var valor = document.getElementById("n_remision").innerHTML;
$(this).parent().html("Contenido nuevo");//obtiene el texto sin html

  });
</script>

<script>
  function ver_datos(Id){

  $.get('/remisiones/' + Id + '/editremision', function (data){
    $('#Idc').val(data.Id);
    $('#Id_remisionu').val(data.Id_remision);
    $('#Id_envaseu').val(data.Id_envase);
    $('#Productou').val(data.Producto);
    $('#Cantidadu').val(data.Cantidad);
    $('#Fecha_ingresou').val(data.Fecha_ingreso);
});
  $('#btn_recibir').on('click', function(){
    var Id_remision = $('#Id_remisionu').val();
    var Id=$('#Idc').val();
    var Id_envase = $('#Id_envaseu').val();
    var Fecha_ingreso = $('#Fecha_ingresou').val();
    var token=$('input[name="_token"]').val();
    $.ajax({
      url:'/remisiones/'+ Id,
      type:'PUT',
      data:{
        Id:Id,
        Id_remision:Id_remision,
        Id_envase:Id_envase,
        Fecha_ingreso:Fecha_ingreso,
        _token:token
      },
      success: function(data){

        $('#submit').click();

          alertify.success('Guardado con exito');
          console.log(data);


      }
    });
  });

}
</script>
<script>


var stockinventario= (function(Id) {     

  var token=$('input[name="_token"]').val();
  var Id_envase =$('#txtNombre').val();
      $.ajax({
    dataType: 'json',
    type:'put',
    url:"{!!URL::to('stockinventario')!!}/"+"'Id'",
    data:{Id_envase:Id_envase,_token:token},
    success:function(json){
      console.log(json.Id_envase);
     console.log(token);
        console.log('SI');
       
        //alertify.success('Guardado con exito');
    
       
  },
error: function(e) {
    console.log(e.message);
}
  
      
    }); 

});
var antistockinventario= (function(Id) {     

  var token=$('input[name="_token"]').val();
  var Id =$('#txtNombreid').val();
      $.ajax({
    dataType: 'json',
    type:'put',
    url:"{!!URL::to('antistockinventario')!!}/"+Id,
    data:{Id:Id,_token:token},
    success:function(json){
      console.log(json.Id);
        console.log('Cambiado');
      
       
        alertify.success('Recibido con exito');
    
       
  },
error: function(e) {
    console.log(e.message);
}
  
      
    }); 

});

  $(document).ready(function() {
    $('#tablaa').DataTable({
       "responsive":true,
          "language":{
        "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No Vacio"
            },
            "moment": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacio"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "not": "No",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": "."

    }
    });

} );
  

</script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#miTabla').DataTable({
       "responsive":true,
          "language":{
        "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %d fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "1": "Mostrar 1 fila",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No Vacio"
            },
            "moment": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacio"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "not": "No",
                "notBetween": "No entre",
                "notEmpty": "No vacío"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "not": "No",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d"
    },
    "select": {
        "1": "%d fila seleccionada",
        "_": "%d filas seleccionadas",
        "cells": {
            "1": "1 celda seleccionada",
            "_": "$d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        }
    },
    "thousands": "."

    }
    });

} );


</script>
 <script>
        function zfill(number, width) {
                  var numberOutput = Math.abs(number); /* Valor absoluto del número */
                  var length = number.toString().length; /* Largo del número */ 
                  var zero = "0"; /* String de cero */  
                  
                  if (width <= length) {
                      if (number < 0) {
                           return ("-" + numberOutput.toString()); 
                      } else {
                           return numberOutput.toString(); 
                      }
                  } else {
                      if (number < 0) {
                          return ("-" + (zero.repeat(width - length)) + numberOutput.toString()); 
                      } else {
                          return ((zero.repeat(width - length)) + numberOutput.toString()); 
                      }
                  }
              }







                </script>
@endsection