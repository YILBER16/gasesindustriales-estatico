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


</head>

  
@section('contenido')

              @include('remisiones.formremision')
              @section('cuerpo_modal')
              <form id="addform"  action="" method="post"> 
                @csrf
                 @include('remisiones.form')
                 @section('pie_modal')
                 <button type="submit" class="btn btn-primary btn_guardar" id="btn_guardar" name="btn_guardar" >GUARDAR</button> 
                 </form> 
                 @endsection
               
               @endsection
             <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-10">

             <div class="tabla" id="tabla" style="display:none;"></div> 

             <div class="">
              <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn_finalizar float-right" id="btn_finalizar" name="btn_finalizar"style="display:none;"><i class="fas fa-sign-out-alt"></i> Finalizar</button> 
             </div>
                         </div>
             <div class="row justify-content-center ">
              <div class="form-group col-md-12 ">
               <button type="submit" class="btn btn-primary btn_mostrar" id="btn_mostrar" name="btn_mostrar" data-toggle="modal" data-target="#modalNuevo" style="display:none;" >
                <i class="fas fa-plus"></i> Agregar</button> 
               
               </div>
                        </div>

                          </div>
                           </div>
                            </div>
                            



<!-- Modal para registros nuevos -->

<!-- Modal para edicion -->

<!-- ./wrapper -->
<script>
$(document).ready(function(){
  $('.form-control-chosen').chosen();
  fun2();
  $('#Id_envase').trigger("chosen:updated");
    });

  function ver_tabla(){
  $.get('tblremisiones',function(data){
    $('#tabla').empty().html(data);
   console.log('ver tabla');
  });
}
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
</script>

<script>
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
      }
    }); 

});
  $(".btn_finalizar").click(function(e){
        finalizar();
      
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
$(document).ready(function(){
  var Id_remision=$("input[name=Id_remision]").val();
  console.log(Id_remision);
  $('#Id_remision').val(zfill(Id_remision,5));
    
  });
  $(".btnenviar").click(function(e){

  e.preventDefault();
  var Id_remision = $("input[name=Id_remision]").val();
  var Fecha_remision= $("input[name=Fecha_remision]").val();
  var Id_cliente = $("#Id_cliente option:selected").val();
  var Nom_empleado = $("input[name=Nom_empleado]").val();
  var Id_empleado = $("input[name=Id_empleado]").val();
  var token=$('input[name="_token"]').val();
  $.ajax({
    type:'POST',
    url:"{!!URL::to('saveremi')!!}",
    data:{Id_remision:Id_remision,Fecha_remision:Fecha_remision,Id_cliente:Id_cliente,Nom_empleado:Nom_empleado,Id_empleado:Id_empleado,_token:token},
    success:function(data){
      if(data=="ok"){
        fun1();
        fun2();
        console.log("ok,guardada");
        //alertify.success('Guardado con exito');
        swal(
    "Buen trabajo!",
    "Registrado con exito!",
    "success"
   );
      $('#tabla').toggle("slide");
      $('.btn_mostrar').toggle("slide");
      $('.btnenviar').toggle("slide");
      $('.btn_finalizar').toggle("slide");
    
      
    }    
  },
  error:function(){
    swal({
  icon: 'error',
  title: 'Oops...',
  text: 'Verifica los datos',
  footer: '<a href>Why do I have this issue?</a>'
});
        }
      
    });
  });
var fun1= (function() {
    $.ajax({
    type:'get',
    url:"{!!URL::to('consultaremi')!!}",
    data:{},
    success:function(data){
        //alertify.success('Guardado con exito');
          console.log(data.Id_remision);
          $('#Id_remision1').val(data.Id_remision);
          $('#Id_remision1').val(data.Id_remision);
      
  },
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
}else {
swal("Cancelado", "No finalizado", "error");
}
});
}
</script>

@endsection
