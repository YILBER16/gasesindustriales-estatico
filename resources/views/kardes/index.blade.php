@extends('welcome')
@extends('layouts.layout')
@section('titulo')
<title>Kardes</title>
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
<button type="button" class="btn btn-danger float-right" data-toggle="modal" data-target="#modalinformecliente"><i class="fas fa-file-pdf"></i> Informe por cliente</button>
 
        @section('cuerpo_modal_informe_cliente')
    <form action="" method="get" id="formenviar"> 
                @csrf
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label>CC o Nit Cliente</label> 
                                <input type="text" class="form-control" id="Id_cliente" name="Id_cliente" readonly>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                        <label>Nombre Cliente</label>                                  
                                            <select id="cliente" name="cliente" class="form-control form-control-chosen">

                                                <option value="">Seleccione una opción</option>
                                                @foreach($clientes as $cliente)
                                                <option value="{{$cliente['Id_cliente']}}">{{$cliente['Nom_cliente']}}</option>
                                                @endforeach
                                            </select>
                                                
                                            
                                {!! $errors->first('Id_cliente','<div class="invalid-feedback">:message</div>') !!}
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-2 col-sm-2 col-md-2 d-flex align-items-center justify-content-center">
                                <div class="form-group">
                                    <label>Fechas</label>
                                    <br>
                                        <input type="checkbox" name="fechas" id="fechas" value="no" class="mgc-switch mgc-lg">
                                </div> 
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <div class="form-group">
                                <label>Fecha inicial</label>
                                <input id="fechainicial" name="fechainicial" type="datetime-local"  class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                            <div class="form-group">
                                <label>Fecha final</label>
                                <input id="fechafinal" name="fechafinal" type="datetime-local"  class="form-control" disabled>
                            </div>
                        </div>
                        
                    </div>
                @section('pie_modal_informe_cliente')
            <button type="submit" class="btn btn-danger btn-consultar-pdf" id="btn-consultar-pdf" name="btn-consultar-pdf">Consultar <i class="fas fa-file-pdf"></i></button>
            <button type="button" class="btn btn-primary btn-consultar" id="btn-consultar" name="btn-consultar">Consultar <i class="far fa-eye"></i></button>
    </form> 
        
         <table class="table table-striped  table-hover table-curved text-center table2 display responsive no-wrap" width="100%" id="tblclientes">
             <thead>
                <tr class="">
                    <th>Nº remision</th>
                    <th>Id envase</th>
                    <th>Producto</th>
                    <th>Cantidad (Mt3)</th>
                    <th>Fecha salida</th>
                    <th>Fecha ingreso</th>
                </tr>
             </thead>
             <tbody id="resultados">

            </tbody>
            
        </table>
        @endsection
        @endsection  
         <div class="container ">
           <h4 class="titulo center" ><b>KARDEX DE TRAZABILIDAD</b> </h4>

          <table class=" table table-striped  table-hover table-curved text-center table2 display responsive no-wrap" width="100%" id="miTabla">
            <thead >
              <tr class="">
                <th>Id envase</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              
              @foreach($envases as $item)
              <tr>

                <td id="n_remision">
            
               {{$item->Id_envase}}
              </td>

                <td>
                <form method="post" action="{{url('/remisiones/'.$item->Id_remision)}}">
                    {{csrf_field() }}
                    <a href="{{url('/kardes/'.$item->Id_envase)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                     <a href="{{url('/kardes.pdfindi/'.$item->Id_envase)}} " type="button" class="btn btn-danger " ><i class="fas fa-file-pdf"></i> </a>
                  </form>
                  

                </td>
              </tr>
           
              
              @endforeach
            </tbody>
          </table>
         

</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('.form-control-chosen').chosen();
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


$(document).ready(function(){
    $('#cliente').on('change', function(){
        var Id_cliente=$(this).val();
        $('#Id_cliente').val(Id_cliente);

    var id =Id_cliente;
    // var enlace = "resumenclientepdf/" + id;
    // document.getElementById("btn-consultar-pdf").setAttribute("href",enlace);
        $('#formenviar').attr('action', 'resumenclientepdf/'+id);
    });

    $("#btn-consultar").click(function(e){
        var Id_cliente = $("input[name=Id_cliente]").val();
        var fechas = $("input[name=fechas]").val();
        var fechainicial = $("input[name=fechainicial]").val();
        var fechafinal = $("input[name=fechafinal]").val();
        var token=$('input[name="_token"]').val();
        console.log(Id_cliente);
        console.log(fechas);
        e.preventDefault();
        $.ajax({
            type:'GET',
            url:"{!!URL::to('resumencliente')!!}/"+Id_cliente,
            data:{
              fechas,fechainicial,fechafinal,
                },
            success:function(data){
            console.log("Correcto");
            console.log(data);
                var html = '';
                var i;
                for (i = 0; i < data.length; i++) {
                html += '<tr>' +
                    '<td>' + data[i].Id_remision + '</td>' +
                    '<td>' + data[i].Id_envase + '</td>' +
                    '<td>' + data[i].Producto + '</td>' +
                    '<td>' + data[i].Cantidad + '</td>' +
                    '<td>' + data[i].created_at + '</td>' +
                    '<td>' + data[i].Fecha_ingreso + '</td>' +
                    '</tr>';
                }
                $('#resultados').html(html);

        },
        error:function(data){
            console.log(data);
            swal({
        icon: 'error',
        title: 'Oops...',
        text: 'Verifica los datos',
        footer: '<a href>Why do I have this issue?</a>'
        });
                }
            
            });
            });
   
});
    $(document).ready(function(){
        $('input[type="checkbox"]').click(function(){
            if($(this).prop("checked") == true){
                $("#fechainicial").removeAttr('disabled');
                $("#fechafinal").removeAttr('disabled');
                $("#fechas").val('si');
                console.log($("#fechas").val())
            }
            else{
                $("#fechainicial").attr('disabled','disabled');
                $("#fechafinal").attr('disabled','disabled');
                $("#fechas").val('no');
                console.log($("#fechas").val())
            }
        });
    });
</script>
@endsection