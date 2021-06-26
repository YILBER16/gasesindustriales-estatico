@extends('layouts.layout')
@section('titulo')
<title>Certificados</title>
@endsection
@section('script')

@endsection
@section('contenido')

          
         <div class="container ">
           
           <div class="modal-footer">
            <h4 class="titulo center" ><b>REMISIONES</b> </h4>
           <form class="form-inline my-2 my-sm-0 ">

      <input class="form-control mr-sm-2 " name="buscarpor" type="search" placeholder="Cedula" aria-label="Search"onkeypress="return validarNumero(event)" maxlength="10" minlength="2" value="{{old('buscarpor')}}">

      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      &nbsp;&nbsp;<button class="btn btn-outline-success my-2 my-sm-0" type="submit" action="{{ url('/clientes/')}}">Volver</button>

    </form>
    </div>


          <table class=" table table-striped  table-hover table-curved text-center table2 display responsive no-wrap" width="100%">
            <thead >
              <tr class="bg-primary titulo2">
                <th>Nº remisión</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Empleado</th>
                <th>Estado</th>
                <th>Acciones</th>

              </tr>
            </thead>
            <tbody>
              @foreach($envases as $item)
              <tr>
                <td>{{$item->Id_envase}}</td>

              </tr>
           
              
              @endforeach
            </tbody>
          </table>
           <div class="modal-footer">
         
        <a href="{{url('remisiones/create')}} " type="button" class="btn btn-success" >Crear remision</a>

</div>

@endsection