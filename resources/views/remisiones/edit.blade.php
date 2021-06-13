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

  <title>EDITAR REMISION</title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet"  href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/alertify.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/themes/default.css')}}">

<script type="text/javascript">

</script>

</head>
@section('contenido')

              @include('remisiones.formremisionedit')
              
              @section('cuerpo_modal')
            	<form id="addform"  action="" method="post"> 
                @csrf
                 @include('remisiones.formedit')
                 @section('pie_modal')
                 <button type="submit" class="btn btn-primary btn_guardar" id="btn_guardar" name="btn_guardar" >GUARDAR</button> 
                 </form> 
                 @endsection
               
               @endsection
             
             <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-10">

             <div class="tablaedit" id="tablaedit"></div> 

             <div class="">
              <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn_finalizar float-right" id="btn_finalizar" name="btn_finalizar"><i class="fas fa-sign-out-alt"></i> Finalizar</button> 
             </div>
                         </div>
             <div class="row justify-content-center ">
              <div class="form-group col-md-12 ">
               <button type="submit" class="btn btn-primary btn_mostrar" id="btn_mostrar" name="btn_mostrar" data-toggle="modal" data-target="#modalNuevo">
                <i class="fas fa-plus"></i> Agregar</button> 
               
               </div>
                        </div>

                          </div>
                           </div>
                            </div>



<!-- Modal para registros nuevos -->

<!-- Modal para edicion -->

<!-- ./wrapper -->


<script >
  $(document).ready(function(){
  $('.form-control-chosen').chosen();
  fun2();
  $('#Id_envase').trigger("chosen:updated");
    });
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  $(document).ready(function(){
  
      $('#Id_cliente').on('change', function(){
      var Id_cliente=$(this).val();
      var cc_cliente=$(this).val();
      var Dir_cliente=$(this).val();
      var Tel_cliente=$(this).val();
      var Cor_cliente=$(this).val();

      $.ajax({
        type:'get',
        url:'{!!URL::to('datosclientes')!!}',
        data:{
          'Id_cliente':Id_cliente,
          'Nom_cliente':cc_cliente,
          'Dir_cliente':Dir_cliente,
          'Tel_cliente':Tel_cliente,
          'Cor_cliente':Cor_cliente
        },
        dataType:'json',
        success:function(data){
          console.log('success');
          $('#Nom_cliente').val(data.Id_cliente);
          $('#Dir_cliente').val(data.Dir_cliente);
          $('#Tel_cliente').val(data.Tel_cliente);
        $('#Cor_cliente').val(data.Cor_cliente);
        },
        error:function(){
          console.log('error');
        }
      });
}).change(); 
  });
  $(document).ready(function(){

    $('#Id_empleado').on('change', function(){
      var Id_empleado=$(this).val();
      var cc_empleado=$(this).val();
      $.ajax({
        type:'get',
        url:'{!!URL::to('datosempleados')!!}',
        data:{
          'Id_empleado':Id_empleado,
          'Id_empleado':cc_empleado,
        },
        dataType:'json',
        success:function(data){
          console.log('success');
          //a.find('#lote').val(data.N_lote);
          $('#cc_empleado').val(data.Id_empleado);
        },
        error:function(){
          console.log('error');
        }
      });
    }).change(); 

  });
  $(document).ready(function(){
  $.get('tblremisionesedit',function(data){
    $('#tablaedit').empty().html(data);
   
  });
});

function ver_tabla(){
  $.get('tblremisionesedit',function(data){
    $('#tablaedit').empty().html(data);
    console.log("si hay tabla");
   
  });
}
function eliminar(Id){

var ruta="{!!URL::to('eliminar')!!}/"+Id;
var token=$('input[name="_token"]').val();
var Id_envase=$(this).find("td").eq(2).html(); 

swal({
  title:"Esta seguro?",
  text:"Recuerde que se eliminara permanentemente el registro",
  icon:"warning",
  buttons:true,
  dangerMode:true,

})


.then((willDelete)=>{

  if(willDelete){
$.ajax({
  url:ruta,
  data:{
    _token:token
  },

  type:"DELETE",
  success: function(data){

  if(data=='ok'){
    $('#submit').click();
    swal('Eliminado con exito','','success')
    ver_tabla();
    fun2();

  }
  }
});
}
});
}
$(document).ready(function(){

  $("#addform").on('submit',function(e){

  e.preventDefault();
  $.ajax({
    type:'POST',
    url:"/saveremienvases",
    dataType:'json',
    data:$('#addform').serialize(),
    success:function(response){
      console.log(response);
      stock();
      fun2();
      
      ver_tabla();
      $('#modalNuevo').modal('hide');
      alertify.success('Guardado con exito');
  },
  error:function(error){
        console.log(error);
        alertify.success('No Guardado');

        }
    });
  });



});
$(document).ready(function(){
    $('#Id_envase').on('change', function(){

      var Id_envase=$(this).val();
      var Id=$(this).val();
      $.ajax({
        type:'get',
        url:'{!!URL::to('datosenvasecerti')!!}',
        data:{
          'Id':Id,
          'Id_envase':Id_envase,
        },
        dataType:'json',
        success:function(data){
          console.log(data.Id);
          $('#Id_producto').val(data.Id_producto);
          $('#Clas_producto').val(data.Clas_producto);
          $('#Cantidad').val(data.Cantidad);
          var valor =$('#Id_producto').val();
          if(valor==1){
           $('#Id_producto').val('Oxigeno');
           }
           if(valor==2)
            $('#Id_producto').val('Nitrogeno'); 
          
     

        },
        error:function(){
          console.log('error');
        }
      });
    });

  });
  var fun2= (function() {
    var $select = $('#Id_envase');
    var $texto= 'Seleccione';
    $.ajax({
    type:'get',
    url:"{!!URL::to('consultaenvaseremisiones')!!}",
    dataType : 'JSON',
    data:{},
    success : function(data) {

     $select.html('');
     $("#Id_envase").append('<option>Seleccione el envase</option>');
     $.each(data,function(key, val) {
      
     $select.append('<option value="' + val.Id_envase + '">'+ val.Id_envase+'</option>');})

    },
    error : function() {
   $select.html('<option id="-1">Cargando...</option>');
  }
    });
});
      $(".btn_mostrar").click(function(e){
        $('#Id_producto').val("");
        $('#Clas_producto').val("");
       $('#Cantidad').val("");
      fun2();
      $('#Id_envase').trigger("chosen:updated");
      console.log('si,reseteado');
      });
      var stock= (function() {
      
    var token=$('input[name="_token"]').val();
  var Id_envase = $("#Id_envase option:selected").val();
 // console.log(Id_envase);

    $.ajax({
    type:'put',
    url:"{!!URL::to('stockremisiones')!!}",
    data:{Id_envase:Id_envase,_token:token},
    success:function(data){
      console.log(data.Id_envase);
     
        console.log('SI');
       
        //alertify.success('Guardado con exito');
        
       
  },
  
      
    });
});
      var finalizar= (function(Id_remision) {     

  var token=$('input[name="_token"]').val();
  var valor=$('#Id_remision').val();
  var Id_remision = valor.replace(/\b0+/g, "");
  console.log(Id_remision)
  swal({
  title:"Esta seguro?",
  text:"Recuerde que ya no podra modificar la remisión",
  icon:"warning",
  buttons:true,
  dangerMode:true,
})
  .then((willDelete)=>{
  if(willDelete){
      $.ajax({
    dataType: 'json',
    type:'put',
    url:"{!!URL::to('finalizarremi')!!}/"+"'Id_remision'",
    data:{Id_remision:Id_remision,_token:token},
    success:function(json){
      console.log(json.Id_envase);
     console.log(token);
        console.log('SI');
       swal('Remisión exitosa','','success')
        $(".swal-button--confirm").click(function(){
          console.log("click");
window.location.href = "/remisiones";
});
        //alertify.success('Guardado con exito');
    
       
  },
error: function(e) {
    console.log(e.message);
}
  
      
    }); 
}else {
swal("Cancelado", "No finalizado", "error");
}
  
      
    }); 
});
  $(".btn_finalizar").click(function(e){
        finalizar();
      
      });
</script>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<!-- Bootstrap 4 -->
@endsection
