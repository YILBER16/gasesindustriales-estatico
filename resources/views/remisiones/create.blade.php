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

  <title>REMISIONES</title>
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
            @if(count($errors)>0)
                <div class="alert alert-danger content"role="alert">
                  <h4>Corrija los siguientes errores:</h4>
                  <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
<div class="container">
  <div class="card">
        <form id="addform"  action="" method="post"> 
            @csrf
            @include('remisiones.formremision')
            @section('cuerpo_modal')
                @include('remisiones.form')
                @section('pie_modal')
                <button type="button" href="javascript:;" id="agregar" class="btn btn-success" disabled> Agregar a tabla</button>
                @endsection           
            @endsection
            <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-10">
                        <button type="button" class="btn btn-primary btn_mostrar" id="btn_mostrar" name="btn_mostrar" data-toggle="modal" data-target="#modalNuevo" disabled>
                        <i class="fas fa-plus"></i> Agregar cilindro</button>    
                    </div>
            </div>
            @include('remisiones.tabla')         
        </form>
    </div>
</div>
    
<script type="text/javascript">
    var table = $('#tabla');
    var i = 0;
    var envase = "0";
    var envasehabilitar="";
    $(document).ready(function(){
        $('.form-control-chosen').chosen();
        //Dar click al boton agregar
        $('#agregar').click(function(){
        var Id_remision=$('#Id_remision_cilindro').val();
        var Id_envase=$('#Id_envase').val();
        var Id_certificado=$('#Id_certificado_cilindro').val();
        var Producto=$('#Producto_cilindro').val();
        var Cantidad=$('#Cantidad_cilindro').val();
        if(Id_remision!="" && Id_envase!="" && Id_certificado!="" && Producto!="" && Cantidad!=""){
        agregar();
        $("#Id_envase option[value='"+envase+"']").attr('disabled',true).trigger("chosen:updated");
        $('#modalNuevo').modal('hide');
        }else{
            alertify.error("Error, verifique los datos");
        }
        
        });
        //Dar click al boton mostrar cilindros
        $('#btn_mostrar').click(function(){
            $("#agregar").prop('disabled', true);
           var Id_remision=$('#Id_remision').val();
           var Id_envase = $('#Id_envase');
            Id_envase.val(Id_envase.children('option:first').val());
            $('#Id_certificado_cilindro').val("");
            $('#Producto_cilindro').val("");
            $('#Cantidad_cilindro').val("");
            $('#Id_remision_cilindro').val(Id_remision);

            });
        //Mostrar datos del cilindro llenado en el certificado
        $('#Id_envase').on('change', function(){
            var Id_envase=$(this).val();
            var Id=$(this).val();
            $.ajax({
            type:'get',
            url:'{!!URL::to('remisionesdatosenvasecerti')!!}',
            data:{
                'Id':Id,
                'Id_envase':Id_envase,
            },
            dataType:'json',
            success:function(data){
                // console.log(data);
                $('#Id_certificado_cilindro').val(data.Id_certificado);
                $('#Producto_cilindro').val(data.Clas_producto);
                $('#Cantidad_cilindro').val(data.Cantidad);
                $("#agregar").prop('disabled', false);
            },
            error:function(){
                // console.log('error');
            }
            });
        });
        //Mostrar consecutivo de factura
        $('#empresa').on('change', function(empresa){
            var empresa= $('#empresa').val();
            var valor=$(this).val();
            // console.log(empresa);
        $.ajax({
            type:'get',
            url:'{!!URL::to('remisionesconsecutivo')!!}',
            data:{
                empresa:empresa,
            },
                dataType:'json',
            success:function(data){
                // console.log(data);
            if(empresa=='Gases'){
            $('#Id_remision').val('Gases-'+zfill(data,5));
            }
            else{
            $('#Id_remision').val('Soluciones-'+zfill(data,5));
            }
            $("#btn_mostrar").prop('disabled', false);
            },
            error:function(){
                // console.log('error');
            }
            });
        });
        //Mostrar datos del cliente
        $('#Id_cliente').on('change', function(){
        var Id_cliente=$(this).val();
        var cc_cliente=$(this).val();
        var Dir_cliente=$(this).val();
        var Tel_cliente=$(this).val();
        var Cor_cliente=$(this).val();

       $.ajax({
        type:'get',
        url:'{!!URL::to('remisionesdatoscliente')!!}',
        data:{
            'Id_cliente':Id_cliente,
            'Nom_cliente':cc_cliente,
            'Dir_cliente':Dir_cliente,
            'Tel_cliente':Tel_cliente,
            'Cor_cliente':Cor_cliente
        },
        dataType:'json',
        success:function(data){
            // console.log('success');
            $('#Nom_cliente').val(data.Id_cliente);
            $('#Dir_cliente').val(data.Dir_cliente);
            $('#Tel_cliente').val(data.Tel_cliente);
            $('#Cor_cliente').val(data.Cor_cliente);
        },
        error:function(){
            // console.log('error');
        }
        });
        });
    });
    
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
   //Boton eliminar fila
    $(document).on('click', '#borrar', function (event) {;
        event.preventDefault();
        //Obtener id_envasde de fila eliminada
        var envasehabilitar = $(event.target).closest('tr').find(".id")[0].childNodes[0].value;
        $("#Id_envase option[value='"+envasehabilitar+"']").attr('disabled',false).trigger("chosen:updated");
        //Eliminar fila
        if(envasehabilitar!=""){
            $(this).closest('tr').remove();
            alertify.success("eliminado con exito");
        }
        
    });
    //Funcion agregar fila
    function agregar(){
        var Id_remision=$('#Id_remision_cilindro').val();
        var Id_envase=$('#Id_envase').val();
        var Id_certificado=$('#Id_certificado_cilindro').val();
        var Producto=$('#Producto_cilindro').val();
        var Cantidad=$('#Cantidad_cilindro').val();
        var fila='<tr>'+
        '<td></td>'+ 
        '<td hidden><input class="form-control" type="text" name="remisiones['+i+'][Id_remision_cilindro]" value="'+Id_remision+'"></td>'+ 
        '<td class="id"><input class="form-control" type="text" name="remisiones['+i+'][Id_envase_cilindro]" value="'+Id_envase+'" readonly></td>'+ 
        '<td hidden><input class="form-control" type="text" name="remisiones['+i+'][Id_certificado_cilindro]" value="'+Id_certificado+'"></td>'+ 
        '<td><input class="form-control" type="text" name="remisiones['+i+'][Producto_cilindro]" value="'+Producto+'" readonly></td>'+ 
        '<td><input class="form-control" type="text" name="remisiones['+i+'][Cantidad_cilindro]" value="'+Cantidad+'" readonly></td>'+ 
        '<td><input class="btn btn-danger" type="button" name="borrar" id="borrar" value="Borrar"></td>'+ 
        '</tr>';
        i=i+1;
        $('#tabla').append(fila);
        envase=Id_envase;
        alertify.success('Agregado con exito');
    }
    $(document).ready(function(){
        $("#addform").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            type:'POST',
            url:"/remisiones",
            dataType:'json',
            data:$('#addform').serialize(),
            success:function(response){

        swal('Remisión exitosa','','success');
        $(".swal-button--confirm").click(function(){
        // console.log("click");
        window.location.href = "/remisiones";
    });
        },
        error:function(error){
                // console.log(error);
                swal('Verifique que los datos esten completos','','error');

                }
            });
        });
    });
</script>
@endsection
