@extends('layouts.layout')
@section('titulo')
<title>Roles</title>
@endsection
@section('script')
  <script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut(1500);
    },6000);
});
</script>
 <script type="text/javascript">
function validarNumero(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    patron =/[0-9]/;
    te = String.fromCharCode(tecla); 
    return patron.test(te); 
 }
</script>
@endsection
@section('contenido') 
          
         <div class="container ">
           
           <div class="modal-footer">
            <h4 class="titulo center" ><b>LISTADO DE USUARIOS</b> </h4>
           <form class="form-inline my-2 my-sm-0 ">

    </form>
    </div>
          <table class=" table table-striped  table-hover table-curved text-center table2">
            <thead >
              <tr class="bg-primary titulo2">
                <th>Id</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Permisos</th>

              </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->slug}}</td>
                <td>
                </tr>
            </tbody>
          </table>
        <div class="modal-footer">
         
        <a href="{{url()->previous()}} " type="button" class="btn btn-success" >Volver</a>

</div>

@endsection
