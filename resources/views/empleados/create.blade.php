@extends('layouts.layout')
@section('titulo')
<title>Registrar empleado</title>
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

                <form action="{{url('/empleados')}}" class="form-horizontal col-md-12" method="post">
                  {{csrf_field()}}
                  @include('empleados.form',['Modo'=>'crear'])

                </form>
 <div class="container ">

        <div class="row justify-content-center">
        <div class="col-md-8">
         
<form action="{{route('empleados.import.excel')}}" method="post" enctype="multipart/form-data">
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
            
@endsection