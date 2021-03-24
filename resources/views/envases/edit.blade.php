@extends('layouts.layout')
@section('titulo')
<title>Editar envase</title>
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
                <form action="{{url('/envases/'.$envase->Id_envase)}}" class="form-horizontal col-md-12" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                  @include('envases.formedit',['Modo'=>'editar'])
                   
                </form>

<script>

  $(document).ready(function(){
  $('.form-control-chosen').chosen();
    });
</script>
@endsection
