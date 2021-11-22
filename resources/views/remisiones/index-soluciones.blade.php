@extends('welcome')
@extends('layouts.layout')
@section('titulo')
<title>Remisiones</title>
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
        <a href="{{url('remisiones/create')}} " type="button" class="btn btn-success float-right" style="margin-left: 20px !important;"><i class="fas fa-file-contract"></i> Crear</a>
        <button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#modalinforme"><i class="fas fa-file-pdf"></i> Informe</button>
           <br>
           <h4 class="titulo center" ><b>REMISIONES</b> </h4>
          <table class=" table table-striped  table-hover table-curved text-center nowrap table2 display responsive no-wrap" width="100%" id="miTabla">
            <thead >
              <tr class="">
                <th>Nº remisión</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Exportar</th>
                <th>Eliminar</th>

              </tr>
            </thead>
            <tbody>
              
            </tbody>
          </table>
                @section('cuerpo-modal-informe')
              <form action="{{route('informeremisiones')}}" method="post"> 
                @csrf
                <div class="row">
                <input id="empresa" name="empresa"  value="Soluciones"  class="form-control" hidden>
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
  $('#miTabla').DataTable({
            
            "serverSide":true,
            "processing":true,
            "responsive":true,
            "ajax": "{!!URL::to('indexsoluciones')!!}",
                "columns":[
                    
                    {data:'Id_remision',className: 'n_remision',},
                    {data:'Fecha_remision'},
                    {data:'cliente.Nom_cliente'},
                    {data:'Nom_empleado'},
                    {data:'Estado_remision'},
                    {data:'action'},
                    {data:'action2'},
                    {data:'action3'},
                   
                ],
                columnDefs: [{
                 targets: 4,
                 render: function ( data, type, row ) {
                    
                     if (data == 0) {
                         return "Abierta";
                     }
                     else
                     
                         return "Cerrada";
                 }
             },
             {
                 targets: 5,
                 render: function ( data, type, row ) {
                   
                     if (row['Estado_remision'] == 0) {

                        return data;
                     }
                     else
                     
                         return "Imposible";
                 }
             },
             {
                 targets: 6,
                 render: function ( data, type, row ) {
                   
                     if (row['Estado_remision'] == 1) {
                      return data;
                        
                     }
                     else
                     
                     return "Imposible";
                 }
             },
             {
                 targets: 7,
                 render: function ( data, type, row ) {
                   
                     if (row['Estado_remision'] == 0) {
                      return data;
                        
                     }
                     else
                     
                     return "Imposible";
                 }
             }],
                'fnCreatedRow':function(nRow,aData,iDataIndex){
                        $(nRow).attr('class','item'+aData.Id_remision);
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

//mostrar datos para eliminar registros
$(document).on('click','.deletebutton', function(){
var modal_data = $(this).data('info').split(';');
$('.did').text(modal_data[0]);
$('.dname').html(modal_data[0]);
});
$(document).on('click','.btneliminar', function($Id_remision){
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$.ajax({
type:'post',
url:'/deleteDateremisiones',
data:{
    '_token':"{{ csrf_token() }}",
    'Id_remision':$(".did").text(),
},
success: function(data){
    console.log("eliminado");
    $('#deletemodal').modal('toggle');
    $('#item' +$('.did').text()).remove();
    swal(
  'Excelente!',
  'Registro eliminado!',
  'success'
)
$(".swal-button--confirm").click(function(){
$('#miTabla').DataTable().ajax.reload();
});
    

},error:function(){ 
        alertify.error('Ocurrio un error :( verifica los datos'); 
    }
});
});
</script>
 <script>
@endsection