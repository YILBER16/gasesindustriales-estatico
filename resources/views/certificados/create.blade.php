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
              @include('certificados.formorden')
              
              @section('cuerpo_modal')
            	<form id="addform"  action="" method="post"> 
                @csrf
                 @include('certificados.form')
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
    
             <div class="tabla" id="tabla" style="display:none;" ></div> 

             <div class="">
              <div class="col-md-12">
        <button type="submit" class="btn btn-primary btn_finalizar float-right" id="btn_finalizar" name="btn_finalizar" style="display:none;"><i class="fas fa-sign-out-alt"></i> Finalizar</button> 
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
  function ver_tabla(){
    $.get('tblcertificados',function(data){
      $('#tabla').empty().html(data);
    });
  }
function eliminar(Id){

var ruta=''+ Id;
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
    fun2();
    swal('Eliminado con exito','','success')
    ver_tabla();
    

  }
  }
});
}
});
}


$(document).ready(function(){
  $('.form-control-chosen').chosen();
  $('#Id_envase').trigger("chosen:updated");
    });

  $(document).ready(function(){
    
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
          // console.log('success');
          // console.log(data.N_lote);
          // console.log(data.Fecha_solicitud);
          //a.find('#lote').val(data.N_lote);
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

  });

    $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
    }
  });

  $(".btnenviar").click(function(e){

  e.preventDefault();
  var Id_produccion = $("#Id_produccion option:selected").val();
  var Nom_empleado = $("input[name=Nom_empleado]").val();
  var Id_producto = $("#Id_producto option:selected").val();
  var Capacidad= $("input[name=Capacidad]").val();
  var Pureza= $("input[name=Pureza]").val();
  var Presion= $("input[name=Presion]").val();
  var Observaciones= $("input[name=Observaciones]").val();
  var token=$('input[name="_token"]').val();
  // console.log(Id_produccion);
  $.ajax({
    type:'POST',
    url:"{!!URL::to('savecerti')!!}",
    data:{Id_produccion:Id_produccion,Id_producto:Id_producto,Nom_empleado:Nom_empleado,Capacidad:Capacidad,Pureza:Pureza,Presion:Presion,Observaciones:Observaciones,_token:token},
    success:function(data){
      if(data=="ok"){
        fun1();
        fun2();
        $('#Id_envase').trigger("chosen:updated");
        certiestado();
      //alertify.success('Guardado con exito');
        swal(
    "Buen trabajo!",
    "Registrado con exito!",
    "success"
   );
      $('#Id_produccion').prop('disabled', true).trigger("chosen:updated");
      $('#Id_producto').prop('disabled', true).trigger("chosen:updated");
      $("#Capacidad").prop('disabled', true);
      $("#Pureza").prop('disabled', true);
      $("#Presion").prop('disabled', true);
      $("#Observaciones").prop('disabled', true);
      $('.tabla').toggle("slide");
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
          // console.log(data.Id_certificado);
          $('#Id_certificado').val(data.Id_certificado);
          $('#Id_envase').val(data.Id_envase);
      
  },
    });
});

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
      // console.log(response);
      ver_tabla();
      $('#modalNuevo').modal('hide');
      alertify.success('Guardado con exito');
  },
  error:function(error){
        // console.log(error);
        alertify.error('No guardado');

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
      // console.log(data.Id_envase);
     
      //   console.log('SI');
       
        //alertify.success('Guardado con exito');
        
       
  },
  
      
    });
});
    $(".btn_mostrar").click(function(e){
      fun2();
      $('#Id_envase').trigger("chosen:updated");
      $('input[name=Cantidad').val('');
      $('input[name=Capacidad_max').val('');
      $('#Clas_producto').val('');
      // console.log('si');
      });

  var fun2= (function() {
    var $select = $('#Id_envase');
    var producto = $('#Id_producto').val();
    var $texto= 'Seleccione';
    if(producto==1){
      producto="Oxigeno";
    }
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
      // console.log(data)
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
      // console.log(data.certi_estado);
     
      //   console.log('SI');
       
        //alertify.success('Guardado con exito');
  
  }, 
    });
});
  var finalizar= (function(Id_certificado) {     

  var token=$('input[name="_token"]').val();
  var Id_certificado=$('#Id_certificado').val();
  // console.log(Id_certificado)
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
    //   console.log(json.Id_envase);
    //  console.log(token);
    //     console.log('SI');
       swal('Certificado exitoso','','success')
        $(".swal-button--confirm").click(function(){
          // console.log("click");
window.location.href = "/certificados";
});
        //alertify.success('Guardado con exito');
    
       
  },
error: function(e) {
    // console.log(e.message);
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
  $(document).ready(function(){
    fun2();
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
          // console.log(data.Clas_producto);
          // console.log(data.Id_envase);
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
