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

  <title>EDITAR CERTIFICADO</title>

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
function mostrarPassword(){
    var cambio = document.getElementById("contrasena");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
  
  $(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
});
</script>

</head>
@section('contenido')

              @include('certificados.formordenedit')
              
              @section('cuerpo_modal')
            	<form id="addform"  action="" method="post"> 
                @csrf
                  @include('certificados.formedit')
                 @section('pie_modal')
                 <button type="submit" class="btn btn-primary btn_guardar" id="btn_guardar" name="btn_guardar" >GUARDAR</button> 
                 </form> 
                 @endsection
               
               @endsection
                @section('cuerpo_modal_actualizar')

                @csrf
                 @include('certificados.formac')
                 @section('pie_modal_actualizar')
                 <button type="submit" class="btn btn-warning" id="btn_actualizar" data-dismiss="modal">Actualizar</button>
                 @endsection
               
               @endsection
               
             <div class="container ">
               
      <div class="row justify-content-center">
        
        <div class="col-md-10">
          
             <div class="tablaedit" id="tablaedit"  ></div> 

             <div class="">
              <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn_finalizar float-right" id="btn_finalizar" name="btn_finalizar" ><i class="fas fa-sign-out-alt"></i> Finalizar</button> 
             </div>
                         </div>
             <div class="row justify-content-center ">
              <div class="form-group col-md-12 ">
               <button type="submit" class="btn btn-primary btn_mostrar" id="btn_mostrar" name="btn_mostrar" data-toggle="modal" data-target="#modalNuevo" >
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
});

$(document).ready(function(){
  
  $.get('tblcertificadosedit',function(data){
    $('#tablaedit').empty().html(data);
   
  });
});

function ver_tabla(){
  $.get('tblcertificadosedit',function(data){
    $('#tablaedit').empty().html(data);
    console.log("si hay tabla");
   
  });
}



function eliminar(Id){

var ruta='/certificados/'+ Id;
var token=$('input[name="_token"]').val();

swal({
  title:"esta seguro?",
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
    swal('eliminado con exito','','success')
    ver_tabla();
    fun2();
  }
  }
});
}
});
}
</script>
<script>
  $(document).ready(function(){


      //console.log("Si");
      var Id_produccion=$("input[name=Id_produccion]").val();
      var f_solicitud=$(this).val();
      var cantidad=$(this).val();
      var f_inicial=$(this).val();
      var f_final=$(this).val();
      var f_vencimiento=$(this).val();
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
          'Fecha_vencimiento':f_vencimiento
        },
        dataType:'json',
        success:function(data){
          console.log('success');
          console.log(data.N_lote);
          console.log(data.Fecha_solicitud);
          //a.find('#lote').val(data.N_lote);
          $('#lote').val(data.N_lote);
          $('#f_solicitud').val(data.Fecha_solicitud);
          $('#cantidadm').val(data.Cantidad_m3);
          $('#f_inicial').val(data.Fecha_solicitud);
          $('#f_final').val(data.updated_at);
          $('#f_vencimiento').val(data.Fecha_vencimiento);
        },
        error:function(){

        }
      });


  });




</script>


<script type="text/javascript">
    $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
  });

 

$(".prueba").click(function(){
  swal(
    "Buen trabajo!",
    "Registrado con exito!",
    "success"
   );
});





var fun1= (function() {
    $.ajax({
    type:'get',
    url:"{!!URL::to('consulta')!!}",
    data:{},
    success:function(data){
        //alertify.success('Guardado con exito');
          console.log(data.Id_certificado);
          $('#Id_certificado').val(data.Id_certificado);
          $('#Id_envase').val(data.Id_envase);
      
  },
    });
});


</script>


<script type="text/javascript">
$.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
  });

$(document).ready(function(){

  $("#addform").on('submit',function(e){
  
  e.preventDefault();
  var capacidad_max=$('#Capacidad_max').val();
  var cantidad=$('#Cantidad').val();

  if(cantidad<=capacidad_max){
  $.ajax({
    type:'POST',
    url:"/savecerenvases",
    dataType:'json',
    data:$('#addform').serialize(),
    success:function(response){


      stock();
      fun2();
      console.log(response);
      ver_tabla();
      $('#modalNuevo').modal('hide');
      alertify.success('Guardado con exito');
  },
  error:function(error){
        console.log(error);
        alertify.error('No Guardado');

        }
    });
  }
  else{
        alertify.error('La cantidad es mayor a la capacidad maxima');      
  }
  });



});

  var stock= (function() {
      
    var token=$('input[name="_token"]').val();
  var Id_envase = $("#Id_envase option:selected").val();
 // console.log(Id_envase);

    $.ajax({
    type:'put',
    url:"{!!URL::to('stock')!!}",
    data:{Id_envase:Id_envase,_token:token},
    success:function(data){
      console.log(data.Id_envase);
     
        console.log('SI');
       
        //alertify.success('Guardado con exito');
        
       
  },
  
      
    });
});
  $(".btn_mostrar").click(function(e){
      fun2();
      $('#Id_envase').trigger("chosen:updated"); 
      $('#Clas_producto').val('');
      $('input[name=Capacidad_max').val('');
      $('input[name=Cantidad').val('');
      
      console.log('si');
      });
  var fun2= (function() {
    var $select = $('#Id_envase');
    var $texto= 'Seleccione';
    $.ajax({
    type:'get',
    url:"{!!URL::to('consultaenvase')!!}",
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
  var certiestado= (function() {
      
    var token=$('input[name="_token"]').val();
  var Id_produccion = $("#Id_produccion option:selected").val();
 // console.log(Id_envase);

    $.ajax({
    type:'put',
    url:"{!!URL::to('listordenes')!!}",
    data:{Id_produccion:Id_produccion,_token:token},
    success:function(data){
      console.log(data.certi_estado);
     
        console.log('SI');
       
        //alertify.success('Guardado con exito');
        
       
  },
  
      
    });
});
    var finalizar= (function(Id_certificado) {     

  var token=$('input[name="_token"]').val();
  var Id_certificado=$('#Id_certificado').val();
  console.log(Id_certificado)
  swal({
  title:"Esta seguro?",
  text:"Recuerde que ya no podra modificar el certificado",
  icon:"warning",
  buttons:true,
  dangerMode:true,
})
  .then((willDelete)=>{
  if(willDelete){

      $.ajax({
    dataType: 'json',
    type:'put',
    url:"{!!URL::to('finalizarcerti')!!}/"+"'Id_certificado'",
    data:{Id_certificado:Id_certificado,_token:token},
    success:function(json){
      console.log(json.Id_envase);
     console.log(token);
        console.log('SI');
        swal('Certificado exitoso','','success')
        $(".swal-button--confirm").click(function(){
          console.log("click");
window.location.href = "/certificados";
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
<script>
  $(document).ready(function(){
    $('#Id_envase').on('change', function(){
      //console.log("Si");
      var Id_envase=$(this).val();
      var Clas_producto=$(this).val();
      var Capacidad=$(this).val();
      //console.log(Id_produccion);
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
          console.log(data.Clas_producto);
          console.log(data.Id_envase);
          // $('#lote').val(data.N_lote);
          $('#Clas_producto').val(data.Clas_producto);
          $('#Capacidad_max').val(data.Capacidad);


        },
        error:function(){

        }
      });
    });

  });
</script>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->

<!-- Bootstrap 4 -->
@endsection
