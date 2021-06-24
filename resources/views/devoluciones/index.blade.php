@extends('welcome')
@extends('layouts.layout')
@section('titulo')
<title>Devoluciones</title>
@endsection
@section('script')

@endsection
      @section('contenido')
      @if ($errors->any())
    <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
            @endforeach
         </ul>
    </div>
        @endif
          
         <div class="container ">

<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalinforme"><i class="fas fa-file-pdf"></i> Informe</button>
           <h4 class="titulo center" ><b>DEVOLUCIONES REALIZADAS</b> </h4>

          <table class="table table-striped  table-hover table-curved text-center nowrap display responsive no-wrap" width="100%" id="devolucionestabla">
            <thead >
              <tr class="">
                <th>Id</th>
                <th>Fecha devolución</th>
                <th>Nº remisión</th>
                <th>Nº envase</th>
                <th>CC cliente</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Detalles</th>

              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
          
              @section('cuerpo-modal-informe')
              <form action="{{route('informedevoluciones')}}" method="post"> 
                @csrf
                <div class="row">
          <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <label>Fecha inicial</label>
                  <input id="fechainicial" name="fechainicial" type="datetime-local"  class="form-control">
              </div>
         </div>
         <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <label>Fecha final</label>
                  <input id="fechafinal" name="fechafinal" type="datetime-local"  class="form-control">
              </div>
         </div>
        </div>
                 @section('pie-modal-informe')
                 <button type="submit" class="btn btn-primary btn-cunsultar" id="btn-consultar" name="btn-consultar">Consultar</button>
                 </form> 
                 @endsection
               
               @endsection  
          </div>
<script>
$(document).ready(function() {
  $('#devolucionestabla').DataTable({
            
            "serverSide":true,
            "processing":true,
            "responsive":true,
          
            "ajax": "{!!URL::to('devoluciones')!!}",
                "columns":[
                    
                    {data:'id'},
                    {data:'Fecha_devolucion'},
                    {data:'Id_remision'},
                    {data:'Id_envase'},
                    {data:'Id_cliente'},
                    {data:'cliente.Nom_cliente'},
                    {data:'Producto'},
                    {data:'Cantidad'},
                    {data:'action'},
                ],columnDefs: [{
                  "targets": [ 0 ],
                "visible": false,
                "searchable": false
             }],
                'fnCreatedRow':function(nRow,aData,iDataIndex){
                        $(nRow).attr('class','item'+aData.id);
                    },
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
});

                </script>
@endsection