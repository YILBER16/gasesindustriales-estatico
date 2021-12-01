@extends('welcome')
@extends('layouts.layout')
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}"/>
  <title>CERTIFICADOS</title>
  <style>
table
{
    counter-reset: rowNumber;
}

table tr > td:first-child
{
    counter-increment: rowNumber;
}

table tr td:first-child::before
{
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
</style>
</head>
@section('contenido')
          
<div class="container ">
    <div class="card">
    <form id="addform"  action="/pruebas" method="post"> 
         @csrf
         @include('pruebas.formorden')  
          @section('cuerpo_modal')
              @include('pruebas.form')
              @section('pie_modal')
              <button type="button" href="javascript:;" id="agregar" class="btn btn-success" disabled> Agregar a tabla</button>
              @endsection              
           @endsection
           <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-10">
                        <button type="button" class="btn btn-primary btn_mostrar" id="btn_mostrar" name="btn_mostrar" data-toggle="modal" data-target="#modalNuevo">
                        <i class="fas fa-plus"></i> Agregar cilindro</button>    
                    </div>
            </div>
              <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-10">
                            <table class="table table-bordered" id="tabla">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th>Nº</th>
                                        <th hidden>Certificado</th>
                                        <th>Envase</th>
                                        <th>Producto</th>
                                        <th>Cantidad mt3</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                    </div>
              </div> 
              <button type="submit" class="btn btn-success">Guardar a la BD</button>
      </form> 
    </div>   
</div>

<script>
var i = 0;
var envase = "0";
var envasehabilitar="";
function agregar(){
        var Id_certificado=$('#Id_certificado').val();
        var Id_envase=$('#Id_envase').val();
        var producto=$('#Producto').val();
        var Capacidad_max=$('#Capacidad_max').val();
        var Cantidad=$('#Cantidad').val();
        var fila='<tr>'+
        '<td></td>'+ 
        '<td hidden><input class="form-control" type="text" name="certificado['+i+'][Id_certificado_cilindro]" value="'+Id_certificado+'"></td>'+ 
        '<td class="id"><input class="form-control" type="text" name="certificado['+i+'][Id_envase_cilindro]" value="'+Id_envase+'" readonly></td>'+ 
        '<td><input class="form-control" type="text" name="certificado['+i+'][Producto_cilindro]" value="'+producto+'" readonly></td>'+ 
        '<td><input class="form-control" type="text" name="certificado['+i+'][Cantidad_cilindro]" value="'+Cantidad+'" readonly></td>'+ 
        '<td><input class="btn btn-danger" type="button" name="borrar" id="borrar" value="Borrar"></td>'+ 
        '</tr>';
        i=i+1;
        $('#tabla').append(fila);
        envase=Id_envase;
        alertify.success('Agregado con exito');
 }
$(document).ready(function(){
  $("#btn_mostrar").prop('disabled', true);
  $('.form-control-chosen').chosen();
    $('#Id_produccion').on('change', function(){
      //console.log("Si");
      var Id_produccion=$(this).val();
      var f_solicitud=$(this).val();
      var cantidad=$(this).val();
      var f_inicial=$(this).val();
      var f_final=$(this).val();
      var f_vencimiento=$(this).val();
      var cant_envases=$(this).val();
      //console.log(Id_produccion);
      $.ajax({
        type:'get',
        url:'{!!URL::to('ordenfunt')!!}',
        data:{
          'Id_produccion':Id_produccion,
          'Fecha_solicitud':f_solicitud,
          'Cantidad_m3':cantidad,
          'Fecha_inicial':f_inicial,
          'Fecha_final':f_final,
          'Fecha_vencimiento':f_vencimiento,
          'N_envases':cant_envases
        },
        dataType:'json',
        success:function(data){
          $('#lote').val(data.N_lote);
          $('#f_solicitud').val(data.Fecha_solicitud);
          $('#cantidadm').val(data.Cantidad_m3);
          $('#f_inicial').val(data.Fecha_solicitud);
          $('#f_final').val(data.updated_at);
          $('#f_vencimiento').val(data.Fecha_vencimiento);
          $('#cant_envases').val(data.N_envases);
        },
        error:function(){
    
        }
      });
    });
    $('#Id_producto').on('change', function(){
      fun2();
      $("#btn_mostrar").prop('disabled', false);
    });
    $('#Id_envase').on('change', function(){
      var Id_envase=$(this).val();
      var Clas_producto=$(this).val();
      var Capacidad=$(this).val();
      $.ajax({
        type:'get',
        url:'{!!URL::to('consultaproducto')!!}',
        data:{
          'Id_envase':Id_envase,
          'Clas_producto':Clas_producto,
          'Capacidad':Capacidad,
        },
        dataType:'json',
        success:function(data){
          $('#Clas_producto').val(data.Clas_producto);
          $('#Capacidad_max').val(data.Capacidad);
          $("#agregar").prop('disabled', false);
        },
        error:function(){
        }
      });
    });
    $('#agregar').click(function(){
        var Id_certificado=$('#Id_certificado').val();
        var Id_envase=$('#Id_envase').val();
        var Producto=$('#Producto').val();
        var Capacidad=$('#Capacidad_max').val();
        var Cantidad=$('#Cantidad').val();
        if(Id_certificado!="" && Id_envase!="" && Producto!="" && Cantidad!=""){
          if(Cantidad<=Capacidad){
            agregar();
            $("#Id_envase option[value='"+envase+"']").attr('disabled',true).trigger("chosen:updated");
            $('#modalNuevo').modal('hide');
          }else{
            alertify.error("Error, la cantidad no puede ser superior a la capacidad");
          }
        
        }else{
            alertify.error("Error, verifique los datos");
        }
        });
         //Boton eliminar fila
    $(document).on('click', '#borrar', function (event) {;
        event.preventDefault();
        //Obtener id_envasde de fila eliminada
        var envasehabilitar = $(event.target).closest('tr').find(".id")[0].childNodes[0].value;;
        $("#Id_envase option[value='"+envasehabilitar+"']").attr('disabled',false).trigger("chosen:updated");
        //Eliminar fila
        if(envasehabilitar!=""){
            $(this).closest('tr').remove();
            alertify.success("eliminado con exito");
        }
        
    });
    //Dar click al boton mostrar cilindros
    $('#btn_mostrar').click(function(){
            $("#agregar").prop('disabled', true);
            $('#Producto').val('').trigger('chosen:updated');
            $('#Cantidad').val("");
            $('#Capacidad_max').val("");
      });
  });
  var fun2= (function() {
    var $select = $('#Id_envase');
    var producto = $('#Id_producto').val();
    var $texto= 'Seleccione';
    if(producto==1)producto="Oxigeno";
    if(producto==2)producto="Helio";
    if(producto==3)producto="Nitrogeno";
    if(producto==4)producto="Argon";
    if(producto==5)producto="Acetileno";
    if(producto==6)producto="CO2";
    if(producto==7)producto="Mezclas";
    if(producto==8)producto="Oxigeno medicinal";
    if(producto==9)producto="Oxigeno industrial";
    // console.log(producto);
    $.ajax({
    type:'get',
    url:"{!!URL::to('consultaenvase')!!}",
    dataType : 'JSON',
    data:{
      producto,
    },
    success : function(data) {
      console.log(data)
     $select.html('');
     $("#Id_envase").append('<option>Seleccione el envase</option>');
     $.each(data,function(key, val) {
      
     $select.append('<option value="' + val.Id_envase + '">'+ val.Id_envase+'</option>');})
     $('#Id_envase').trigger("chosen:updated");
    },
    error : function() {
   $select.html('<option id="-1">Cargando...</option>');
  }
    });
});
// $(document).ready(function(){
//         $("#addform").on('submit',function(e){
//         e.preventDefault();
//         $.ajax({
//             type:'POST',
//             url:"/pruebas",
//             dataType:'json',
//             data:$('#addform').serialize(),
//             success:function(response){

//         swal('Remisión exitosa','','success');
//         $(".swal-button--confirm").click(function(){
//         // console.log("click");
//         window.location.href = "/pruebas";
//     });
//         },
//         error:function(error){
//                 console.log(error);
//                 swal('Verifique que los datos esten completos','','error');

//                 }
//             });
//         });
//     });
</script>
@endsection
