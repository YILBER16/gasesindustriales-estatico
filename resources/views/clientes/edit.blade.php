@extends('layouts.layout')
@section('titulo')
<title>Modificar cliente</title>
@endsection

@section('contenido')
                <form action="{{url('/clientes/'.$cliente->Id_cliente)}}" class="form-horizontal col-md-12" method="post">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                  @include('clientes.form',['Modo'=>'editar'])
                   
                </form>
@endsection