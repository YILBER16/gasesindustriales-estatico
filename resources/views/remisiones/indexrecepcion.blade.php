@extends('welcome')
@extends('layouts.layout')
@section('titulo')
<title>Recepciòn</title>
@endsection
@section('script')

@endsection
@section('contenido')
  @if (session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif
<meta name="csrf-token" content="{{ csrf_token() }}" />     
<div class="container">
<a href="{{url('/devoluciones')}} " type="button" class="btn btn-primary float-right" ><i class="fas fa-undo-alt"></i> Devoluciones</a>
    <br>
  <h4 class="titulo center" ><b>ENVASES PRESTADOS</b> </h4>
  <table class="table table-striped  table-hover table-curved text-center nowrap tablaa display responsive no-wrap" width="100%" id="tablaa">
              <thead >
                <tr class="">
                  <td>Id</td>
                  <td>Id envase</td>
                  <td>Nº remision</td>
                  <td>Id cliente</td>
                  <td>Cliente</td>
                  <td>Producto</td>
                  <td>Cantidad</td>
                  <td>Fecha remision</td>
                  <td>Recibir</td>
                  <td>Devolución</td>
                  <td>pivot</td>
                </tr>
              </thead>
              <tbody>
                <!-- {{-- @foreach($envasesafuera as $item)
                <tr>
                  <td hidden="">{{$item->Id}}</td>
                  <td>{{$item->Id_envase}}</td>
                  <td>{{$item->Id_remision}}</td>
                  <td>{{$item->remision->cliente->Id_cliente}}</td>
                  <td>{{$item->remision->cliente->Nom_cliente}}</td>
                  <td>{{$item->Producto}}</td>
                  <td>{{$item->Cantidad}}</td>
                  <td>{{$item->remision->Fecha_remision}}</td>
                  <td>
  
                    <button type="submit" class="btn btn-primary" id="elim" name="elim" onclick="ver_datos({{$item->Id}});" data-toggle="modal" data-target="#modalremisionedicion"><i class="fas fa-arrow-right" ></i></button>
                    <button type="submit" hidden="" id="submit" name="submit" onclick="antistockinventario('{{$item->Id_envase}}');stockinventario('{{$item->Id_envase}}');">Prueba</button>
                  </td>
                </tr>
              
                
                @endforeach --}} -->
              </tbody>
            </table>
            @section('cuerpo_modal_remision_edicion')

            @include('remisiones.formentradaedicion')

            @section('pie_modal_remision_edicion')
              <button type="submit" id="btn_recibir" class="btn btn-warning btn_recibir" data-dismiss="modal" data-dismiss="modal">Recibir</button>
              @endsection
              @endsection
       </div>
    
  
  <script >
    
    $(document).ready(function() {
          $('#tablaa').DataTable({
            "serverSide":true,
            "processing":true,
            "responsive":true,
          
            "ajax": "{!!URL::to('envasesafuera')!!}",
                "columns":[
                    
                    {data:'Id'},
                    {data:'Id_envase'},
                    {data:'Id_remision'},
                    {data:'remision.cliente.Id_cliente'},
                    {data:'remision.cliente.Nom_cliente'},
                    {data:'Producto'},
                    {data:'Cantidad'},
                    {data:'remision.Fecha_remision'},
                    {data:'action'},
                    {data:'action2'},
                    {data:'action3'},
                   
                ],
                columnDefs: [{
                  "targets": [ 0 ],
                "visible": false,
                "searchable": false
             },
             {
                  "targets": [ 10 ],
                "visible": false,
                "searchable": false
             }],
                'fnCreatedRow':function(nRow,aData,iDataIndex){
                        $(nRow).attr('class','item'+aData.Id);
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
  <script>
  //   $(document).ready(function(){
  //  $('#tablaa tr').on('click', function(){
  //  var dato=$(this).find("td").eq(1).html(); 
  //   var dato2=$(this).find("td").eq(0).html(); 
  //   $('#txtNombre').val(dato);
  //   $('#txtNombreid').val(dato2);
  //   console.log("obtenido");
  // });
  //   });

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
      
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
      $.ajax({
        url:'/remisiones/'+ Id,
        type:'PUT',
        data:{
          Id:Id,
          Id_remision:Id_remision,
          Id_envase:Id_envase,
          Fecha_ingreso:Fecha_ingreso,
                },
        success: function(data){


          stockinventario();
          antistockinventario();
     
       
       // console.log(Id_envase);
         //antistockinventario(Id_envase);
          //stockinventario(Id_envase);
            //alertify.success('Guardado con exito');
            console.log(data);
            console.log(Fecha_ingreso);
  
        },
  error: function() {
    alertify.error('Ocurrio un error :( verifica los datos'); 
  }
      });
    });
  
  }

  
var stockinventario= (function(Id_envase) {     

var token=$('input[name="_token"]').val();
var Id_envase =$('#Id_envaseu').val();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
console.log(Id_envase);
    $.ajax({
  dataType: 'json',
  type:'put',
  url:"{!!URL::to('stockinventario')!!}/"+Id_envase,
  data:{Id_envase:Id_envase},
  success:function(json){
    console.log(json.Id_envase);
   console.log(token);
      console.log('SI');
     },
error: function(e) {
  console.log(e.message);
}

    
  }); 

});
var antistockinventario= (function(Id) {     

var token=$('input[name="_token"]').val();
var Id =$('#Idc').val();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
console.log(Id);
    $.ajax({
  dataType: 'json',
  type:'put',
  url:"{!!URL::to('antistockinventario')!!}/"+Id,
  data:{Id:Id},
  success:function(json){
    console.log(json.Id);
  
      alertify.success('Recibido con exito');
      $('#tablaa').DataTable().ajax.reload();


  
     
},
error: function(e) {
  console.log(e.message);
}

    
  }); 

});
$(document).on('click','.devolverbutton', function(){
var modal_data = $(this).data('info').split(';');
$('.didregistro').text(modal_data[0]);
$('.denvase').html(modal_data[1]);
$('#dremision').val(modal_data[2]);
$('#d_cliente').val(modal_data[3]);
$('#n_cliente').val(modal_data[4]);
$('#d_producto').val(modal_data[5]);
$('#c_producto').val(modal_data[6]);

});


$(document).on('click','.btndevolver', function(Id, Id_envase){
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


  var dremision =$('#dremision').val();
  var Fecha_devolucion =$('#Fecha_devolucion').val();
  var d_cliente =$('#d_cliente').val();
  var denvase =$('#denvase').text();
  var d_producto =$('#d_producto').val();
  var c_producto =$('#c_producto').val();
  var d_empleado =$('#d_empleado').val();
  var n_empleado =$('#n_empleado').val();
  var descripcion =$('#descripcion').val();
console.log(dremision);
console.log(d_cliente);
  
  $.ajax({
type:'post',
url:'/registrardevolucion',
data:{
    _token:"{{ csrf_token() }}",
    dremision:dremision,
    Fecha_devolucion:Fecha_devolucion,
    d_cliente:d_cliente,
    denvase:denvase,
    d_producto:d_producto,
    c_producto:c_producto,
    d_empleado:d_empleado,
    n_empleado:n_empleado,
    descripcion:descripcion,
},
success: function(data){
    console.log("Devolucion registrada");
    
   
    $.ajax({
type:'post',
url:'/elimenvasedevoluciones/' + Id,
data:{
    '_token':"{{ csrf_token() }}",
    'Id':$(".didregistro").text(),
},
success: function(data){
    console.log("eliminado");
   

var Id_envase =$('.denvase').text();

    $.ajax({
  dataType: 'json',
  type:'put',
  url:'/stockenvasedevoluciones/'+ Id_envase,
  data:{Id_envase:Id_envase},
  success:function(json){
    
    
    console.log("devuelto con exito");

    $('#devolucionmodal').modal('toggle');
    $('#tablaa').DataTable().ajax.reload();
    swal(
  'Excelente!',
  'Devuelto con exito!',
  'success'
)
     
},
error: function(e) {
  console.log("error, envase sin cambio de estado");
  console.log(e.message);
}

    
  }); 

},error:function(){ 
        alertify.error('Ocurrio un error al eliminar el registro'); 
    }
});

},error:function(){ 
  console.log("Devolucion rechazada");
        alertify.error('Ocurrio un error al registrar, verifica los datos'); 
    }
});




});

  </script>
@endsection