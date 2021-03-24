@extends('layouts.layout')
@section('titulo')
<title>Modificar usuarios</title>
@endsection
@section('script')

<script type="text/javascript">
function mostrarPassword(){
    var cambio = document.getElementById("contrasena");
    if(cambio.type == "password"){
      cambio.type = "text";
      $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
    }else{
      cambio.type = "password";
      $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
    }
  } 
  
  $(document).ready(function () {
  //CheckBox mostrar contraseña
  $('#ShowPassword').click(function () {
    $('#Password').attr('type', $(this).is(':checked') ? 'text' : 'password');
  });
});
</script>

@endsection
@section('contenido')    <!-- Main content -->
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form action="{{url('/users/'.$user->id)}}" class="form-horizontal col-md-12" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                  @include('users.formedit',['Modo'=>'editar'])
                   
                </form>
            </div>
        </div>
    </div>
</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script>
  $(document).ready(function(){
    var permissions_box=$('#permissions_box');
    var permissions_checkbox_list=$('#permissions_checkbox_list');
    var user_permissions_box = $('#user_permissions_box');
    var user_permissions_checkbox_list = $('#user_permissions_checkbox_list');
    permissions_box.hide();

    $('#role').on('change',function(){
      var role=$(this).find(':selected');
      var role_id= role.data('role-id');
      var role_slug = role.data('role-slug');

      permissions_checkbox_list.empty();//vaciamos el div de cada permiso
      user_permissions_box.empty();

      $.ajax({
        url:"/users/create",//se hace llamada a la ruta
        method:'get',
        dataType:'json',
        data:{
          role_id:role_id,
          role_slug:role_slug,
        }
      }).done(function(data){
        console.log(data);
        permissions_box.show();
        $.each(data,function(index, element){
          $(permissions_checkbox_list).append(
            '<div class="custom-control custom-checkbox">'+
            '<input class="custom-control-input" type="checkbox" name="permissions[]" id="'+ element.slug+'" value="'+element.id+'">'+
            '<label class="custom-control-label" for="'+element.slug+'">'+element.name+'</label>'+
            '</div>'
            );
        });
      });
    });
  });
</script>
@endsection