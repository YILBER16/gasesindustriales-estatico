@extends('welcome')
@extends('layouts.layout')
@section('titulo')
<title>Kardes</title>
@endsection
@section('contenido')

          
         <div class="container">
           <h4 class="titulo center" ><b>KARDEX DE TRAZABILIDAD</b> </h4>

        
           <table class=" table table-striped  table-hover table-curved text-center table2 display responsive no-wrap" width="100%" id="miTabla">
            <thead >
              <tr class="">

                <th>Fecha</th>
                <th>Nº certificado</th>
                <th>Lote</th>
                <th>Fecha vencimiento</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Fecha salida</th>
                <th>Fecha ingreso</th>
                
              </tr>
            </thead>
            <tbody>
            
            @foreach($datos as $index => $item)
              <tr>
              <td>{{$item->certificado->created_at}}</td>
              <td>{{$item->Id_certificado}}</td>
              <td>{{$item->certificado->orden->N_lote}}</td>
              <td>{{$item->certificado->orden->Fecha_vencimiento}}</td>
              <td>{{isset($datos2[$index]->Cantidad)?$datos2[$index]->Cantidad :''}}</td>
              <td>{{isset($datos2[$index]->Producto)?$datos2[$index]->Producto :''}}</td>
              <td>{{isset($datos2[$index]->remision->cliente->Nom_cliente)?$datos2[$index]->remision->cliente->Nom_cliente :''}}</td>
              <td>{{isset($datos2[$index]->created_at)?$datos2[$index]->created_at :''}}</td>
              <td>{{isset($datos2[$index]->Fecha_ingreso)?$datos2[$index]->Fecha_ingreso :''}}</td>
               </tr>
               @endforeach
               
            </tbody>

          </table>
         

           <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-lg" onclick="window.location='{{ URL::previous() }}'">Volver</button>

</div>
</div>

@endsection