@extends('layouts.layout')
@section('titulo')
<title>Editar orden</title>
@endsection
@section('script')

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

@endsection
@section('contenido')
                <form action="{{url('/ordenes/'.$orden->Id_produccion)}}" class="form-horizontal col-md-12" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                  @include('ordenes.formedit',['Modo'=>'editar'])
                   
                </form>
@endsection