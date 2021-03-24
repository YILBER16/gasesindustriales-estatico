@extends('layouts.layout')
@section('titulo')
<title>Crear propietario</title>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/themes/default.css')}}">

<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },6000);
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

                <form action="{{url('/propietarios')}}" class="form-horizontal col-md-12" method="post" id="formpropi">
                  {{csrf_field()}}
                  @include('propietarios.form',['Modo'=>'crear'])

                </form>
                 <div class="container ">

        <div class="row justify-content-center">
        <div class="col-md-8">
      
<form action="{{route('propietarios.import.excel')}}" method="post" enctype="multipart/form-data">
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
</script>
<script>
  $(document).ready(function(){
  $("#formpropi").submit( function () {

var nm_unit = $("#namaunit").val();
var almtunit = $("#almtunit").val();

swal({
    title: "Are you sure?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes!",
    cancelButtonText: "Cancel",
    closeOnConfirm: true
}, function(isConfirm){
  if (isConfirm) {
    event.preventDefault();
        return true;
  } else {
    return false;
  }
});

});
  });
</script>
 @endsection