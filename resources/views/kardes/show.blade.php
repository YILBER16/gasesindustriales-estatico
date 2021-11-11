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
                <th>Nº cilindro</th>
                <th>Propietario</th>
                <th>Cantidad</th>
                <th>Producto</th>
                <th>Lote</th>
                <th>Fecha vencimiento</th>
                <th>Fecha salida</th>
                <th>Id cliente</th>
                <th>Fecha ingreso</th>
                
              </tr>
            </thead>
            <tbody>

              @foreach($resultado as $index => $item)

              <tr>
              <td>{{$item->created_at}}</td>
              <td>{{$item->Id_certificado}}</td>
              <td>{{$item->Id_envase}}</td>
              <td>{{$item->Id_propietario}}</td>
              <td>{{$resultado2[$index]->Cantidad}}</td>
              <td>{{$resultado2[$index]->Producto}}</td>
              <td>{{$item->N_lote}}</td>
              <td>{{$item->Fecha_vencimiento}}</td>
              <td>{{$resultado2[$index]->created_at}}</td>
              <td>{{$resultado2[$index]->Nom_cliente}}</td>
              <td>{{$resultado2[$index]->Fecha_ingreso}}</td>
              
              @endforeach
 
             
              

              
             
              

               
               </tr>


            </tbody>

          </table>
         

           <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-lg" onclick="window.location='{{ URL::previous() }}'">Volver</button>

</div>
</div>

@endsection