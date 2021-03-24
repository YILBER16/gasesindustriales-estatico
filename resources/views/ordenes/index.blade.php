@extends('layouts.layout')
@section('titulo')
<title>Ordenes</title>
@endsection
@section('script')
  <script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },6000);
});
</script>
 <script type="text/javascript">
function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    patron =/[0-9]/;
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
 }
</script>
@endsection
@section('contenido')

          @if(Session::has('Mensaje'))
          <div class="alert alert-success content col-sm-12 text-center "role="alert">
          {{ Session::get('Mensaje')}}
          </div>

        
          @endif
          
         <div class="container ">
           <h4 class="titulo center"><b>ORDENES DE PRODUCCIÓN</b> </h4>

          <table class=" table table-striped  table-hover table-curved text-center table2" id="miTabla">
            <thead >
              <tr class="">
                <th>Orden de producción</th>
                <th>Fecha solicitud</th>
                <th>No. Lote</th>
                <th>Estado</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              @foreach($ordenes as $orden)
              <tr>
                <td>{{$orden->Id_produccion}}</td>
                <td>{{$orden->Fecha_solicitud}}</td>
                <td>{{$orden->N_lote}}</td>
                <td>{{$orden->Estado==null?"Abierta":"Cerrada"}}</td>
               
                
                <td>
                  

                  
                  
                  <form method="post" action="{{url('/ordenes/'.$orden->Id_produccion)}}">
                    {{csrf_field() }}

                    <!--{{ method_field('DELETE')}}-->

                    <a href="{{url('/ordenes/'.$orden->Id_produccion)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    
                    @if($orden->Estado==null )
                     <a href="{{ url('/ordenes/'.$orden->Id_produccion).'/edit'}}" class="btn btn-primary" id="edito"><i class="fas fa-edit"></i></a>                    
                     @endif
                   <!-- <button type="submit" onclick="return confirm('¿Desea borrar este registro?');" class="btn btn-danger">Eliminar</button>-->

                  </form>

                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
           <div class="modal-footer">
         
        <a href="{{url('ordenes/create')}} " type="button" class="btn btn-success" >Agregar orden</a>

</div>

         </div>
  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->
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

@endsection