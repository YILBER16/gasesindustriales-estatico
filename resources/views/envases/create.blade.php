@extends('layouts.layout')
@section('titulo')
<title>Registro de envase</title>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(4500);
    },10000);
});
$(document).ready(function() {
$('#Id_proveedor').change(function(){
    var valorCambiado =$(this).val();
    console.log($(this).val());
    if((valorCambiado == '')){
       document.getElementsByClassName('estado1')[0].style.display = "none"
       console.log("si");
       document.getElementById("Fecha_compra").value = "";
       document.getElementById("Garantia").value = "";
       document.getElementById("Fecha_fabricacion").value = "";
     }
     else
     {
   document.getElementById("estado1").style.display = "block";
         console.log("no");
     }
});

});
</script>

<script >
  $(document).ready(function() {
    $('#Clas_producto').change(function() {
    if($('#Clas_producto').val().trim() === 'Oxigeno medicinal'){
       $('#Color').val('Blanco');
     }else{
     if($('#Clas_producto').val().trim() === 'Oxigeno industrial'){
       $('#Color').val('Verde');
     }
     
      if($('#Clas_producto').val().trim() === 'Nitrogeno'){
       $('#Color').val('Negro');
     }
     if($('#Clas_producto').val().trim() === 'Argon'){
       $('#Color').val('Gris');
     }
     if($('#Clas_producto').val().trim() === 'Acetileno'){
       $('#Color').val('Naranja');
     }
     if($('#Clas_producto').val().trim() === 'Co2'){
       $('#Color').val('Verde oliva');
     }
     if($('#Clas_producto').val().trim() === 'Mezclas'){
       $('#Color').val('Dorado');
     }
     if($('#Clas_producto').val().trim() === 'Aire'){
       $('#Color').val('Blanco con negro');
     }
     if($('#Clas_producto').val().trim() === 'Helio'){
       $('#Color').val('Marron');
     }
     if($('#Clas_producto').val().trim() === ''){
       $('#Color').val('');
     }
}
});
    });
</script>

@endsection
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

                <form action="{{url('/envases')}}" class="form-horizontal col-md-12" method="post">
                  {{csrf_field()}}
                  @include('envases.form',['Modo'=>'crear'])

                </form>


                 <div class="container ">

        <div class="row justify-content-center">
        <div class="col-md-8">
      
<form action="{{route('envases.import.excel')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @if(Session::has('message'))
                  <p>{{Session::get('message')}}</p>
                  @endif



<div class="file-loading">
    <input id="input-image-2" name="file" type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
</div>


<br>
 </form>

  </div>
   </div>
    </div>
    </li>
<script>
$("#input-image-2").fileinput({
 
    allowedFileExtensions: ["xlsx"],
    maxImageHeight: 150,
    maxFileCount: 1,
    resizeImage: true
}).on('filepreupload', function() {
    $('#kv-success-box').html('');
}).on('fileuploaded', function(event, data) {
    $('#kv-success-box').append(data.response.link);
    $('#kv-success-modal').modal('show');
});
$(document).ready(function(){
  $('.form-control-chosen').chosen();
    });
</script>
@endsection