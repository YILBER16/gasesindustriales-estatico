@extends('welcome')
@extends('layouts.layout')
@section('titulo')
<title>Registro de envases</title>
@endsection
@section('script')

@endsection
@section('contenido')

    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$remisiones}}</h3>

                <p>Remisiones expedidas</p>
              </div>
              <div class="icon">
               <i class="fas fa-cart-arrow-down"></i>
              </div>
              <a href="{{ url('/remisiones/')}}" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$masdemesnumero}}</h3>

                <p>Prestados mas de un mes</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-check"></i>
              </div>
              <a href="#" data-toggle="modal" data-target="#modalmes" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
                          </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark" >
              <div class="inner">
                <h3>{{$gases}}</h3>

                <p style="">Cilindros propios</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-check"></i>
              </div>
              <a href="{{ url('/envases/')}}" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$porllenar}}</h3>

                <p>Disponibles por llenar</p>
              </div>
              <div class="icon">
                <i class="fas fa-clipboard-check"></i>
              </div>
              <a href="{{ url('/envases/')}}" class="small-box-footer">Mas detalles <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
         </section>

         <div class="container ">
            <div class="card">
              <div class="card-header">
            <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                  Clindros fuera de almacen
                </h3>
           </div>

           <div class="card-body">
                <table class=" table table-striped  table-hover table-curved text-center table2" id="miTabla">
                    <thead >
                          <tr class="">
                            <th>Fecha remision</th>
                            <th>Nº remision</th>
                            <th>Id envase</th>
                            <th>Cliente</th>
                            <th>Tiempo</th>
                          </tr>
                    </thead>
                        <tbody>
                         @foreach ($datos2 as $podcast)

                         <tr>
                        <td>{{$podcast->remision->Fecha_remision}}</td>
                        <td>{{$podcast->remision->Id_remision}}</td>
                        <td>{{$podcast->Id_envase}}</td>
                         <td>{{$podcast->remision->cliente->Nom_cliente}}</td>
                     
                         <td>{{$podcast->created_at->diffforhumans(now())}}</td>
                         
                         </tr>
                         @endforeach
                        </tbody>
                       
                </table>

     </div>
     </div>
      </div>
     @section('cuerpo_modal_datos')

     <table class="table table-striped  table-hover table-curved text-center table2" id="miTabla">
                    <thead >
                          <tr class="">
                            <td>Fecha remision</td>
                            <td>Nº remision</td>
                            <td>Id envase</td>
                            <td>Cliente</td>
                            <td>Tiempo</td>
                          </tr>
                    </thead>
                        <tbody>

                       

                         @foreach ($masdemes as $podcast)

                         <tr>
                        <td>{{$podcast->remision->Fecha_remision}}</td>
                        <td>{{$podcast->remision->Id_remision}}</td>
                        <td>{{$podcast->Id_envase}}</td>
                         <td>{{$podcast->remision->cliente->Nom_cliente}}</td>
                     
                         <td>{{$podcast->created_at->diffforhumans(now())}}</td>
                         
                         </tr>
                         @endforeach
        

                        </tbody>
                       
                </table>

     @section('pie_modal_datos')
                 <button type="submit" class="btn btn-danger" data-dismiss="modal" data-dismiss="modal">Cerrar</button>
     @endsection
@endsection
  
           
          


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
});
</script>
@endsection