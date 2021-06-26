@extends('layouts.layout')
@section('titulo')
<title>Usuarios</title>
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
          <table class=" table table-striped  table-hover table-curved text-center table2 display responsive no-wrap" width="100%">
            <thead >
              <tr class="bg-primary titulo2">
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Rol</th>
                <th>Permisos</th>
                

              </tr>
            </thead>
            <tbody>
                <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                   @if($user->roles->isNotEmpty())
                    @foreach($user->roles as $role)
                    <span class="badge badge-primary">
                      {{$role->name}}
                    </span>
                    @endforeach
                  @endif
                </td>
                <td>
                  
                   @if($user->permissions->isNotEmpty())
                    @foreach($user->permissions as $permission)
                    <span class="badge badge-success">
                      {{$permission->name}}
                    </span>
                    @endforeach
                  @endif

                </td>
                </tr>
            </tbody>
          </table>
        <div class="modal-footer">
         
        <a href="{{url()->previous()}} " type="button" class="btn btn-success" >Volver</a>

</div>

         </div>
  <!-- Main Footer -->
 
</div>
<!-- ./wrapper -->
@endsection