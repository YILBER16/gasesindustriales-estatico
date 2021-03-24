@extends('layouts.layout')
@section('titulo')
<title>Modificar rol</title>
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
@section('contenido')
    <!-- Main content -->
    <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form action="{{url('/roles/'.$role->id)}}" class="form-horizontal col-md-12" method="post" enctype="multipart/form-data">
                  {{csrf_field()}}
                  {{method_field('PATCH')}}
                  @include('roles.formedit',['Modo'=>'editar'])
                   
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
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('dist/js/bootstrap-tagsinput.js')}}"></script>
<!-- Bootstrap 4 -->
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#role_name').keyup(function(e){
      var str = $('#role_name').val();
      str= str.replace(/\W+(?!$)/g,'-').toLowerCase();
      $('#role_slug').val(str);
      $('#role_slug').attr('placeholder',str);
    });
  });
</script>
@endsection
