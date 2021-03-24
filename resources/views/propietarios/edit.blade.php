@extends('layouts.layout')
@section('titulo')
<title>Modificar propietario</title>
@endsection
@section('script')

@endsection
@section('contenido')
    <!-- Main content -->
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form action="{{url('/propietarios/'.$propietario->Id_propietario)}}" class="form-horizontal col-md-12" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                  @include('propietarios.form',['Modo'=>'editar'])
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 @endsection