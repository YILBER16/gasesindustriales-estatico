<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

 @yield('titulo')

  <!-- Font Awesome Icons -->

  <link rel="stylesheet"  href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{ asset('dist/css/titulo.css')}}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowgroup/1.1.2/css/rowGroup.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="{{ asset('dist/css/bootstrap-tagsinput.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/alertify.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('dist/css/themes/default.css')}}"><div hidden="">.</div>
<link rel="stylesheet" href="{{asset('css/component-chosen.min.css')}}" >

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->

<script>
@if (session('alert'))

    swal("Buen trabajo!", "Registrado con exito!", "success");

@endif
@if (session('alertedit'))
    swal("Buen trabajo!", "Modificado con exito!", "success");
@endif


@if (session('alertdeleted'))
    swal("Buen trabajo!", "eliminado con exito!", "success");
@endif

</script>
@yield('script')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

    </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
  
      <!-- Notifications Dropdown Menu -->


    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dist/img/logogases.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Gases industriales</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          @auth
          <label class="" style="color:#FFFFFF";>{{Auth::user()->name}} {{Auth::user()->roles->isNotEmpty()? Auth::user()->roles->first()->name : ""}}</label>

          @endauth
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @canany(['isProduccion','isAdmin','isVentas'])
                    <li class="nav-item bg-primary boton2">
                <a href="{{ url('/index/')}}" class="nav-link">

                 <i class="fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
                </a>
          </li>
           @endcanany
          @can('isAdmin')
          <p></p>

          <li class="nav-item has-treeview menu-close boton2">
            <a href="#" class="nav-link active">
              <p>
               <i class="fas fa-users text-center"></i>
                Gestión
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/empleados/')}}" class="nav-link ">
                  <i class="fas fa-user-check"></i>
                  <p>Empleados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/clientes/')}}" class="nav-link"  >
                  <i class="fas fa-user-check"></i>
                  <p>Clientes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/proveedores/')}}" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Proveedores</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/propietarios/')}}" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Propietarios</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          <p></p>
          
          @canany(['isProduccion','isAdmin','isVentas'])
          <li class="nav-item bg-primary boton2">
                <a href="{{ url('/envases/')}}" class="nav-link">

                  <i class="far fa-clipboard"></i>
                  <p>Gestion de cilindros</p>
                </a>
          </li>
          @endcanany
           @canany(['isProduccion','isAdmin'])
          <p></p>
          <li class="nav-item has-treeview menu-close boton2">
            <a href="#" class="nav-link active">
              
              <p>
               <i class="fas fa-cogs"></i>
               Producción
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/ordenes/')}}" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Orden de producción</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/certificados/')}}" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Certificado producción</p>
                </a>
              </li>
            </ul>
          </li>
          @endcanany
          @canany(['isVentas','isAdmin'])
           <p></p>
           
           <li class="nav-item has-treeview menu-close boton2">
            <a href="#" class="nav-link active">
              
              <p>
               <i class="fas fa-cogs"></i>
               Gestion de ventas
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/remisiones/')}}" class="nav-link">
                <i class="fas fa-share-square"></i>
                  <p>Remisiones</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/envasesafuera/')}}" class="nav-link">
                <i class="fas fa-undo-alt"></i>
                  <p>Recepciones</p>
                </a>
              </li>
            </ul>
          </li>
          @endcanany
           @can('isAdmin')
          <p></p>
          <li class="nav-item bg-primary boton2">
                <a href="{{ url('/kardes/')}}" class="nav-link">

                 <i class="fas fa-cart-arrow-down"></i>
                  <p>Kardex</p>
                </a>
          </li>
          
          <p></p>
          <li class="nav-item has-treeview menu-close boton2">
            <a href="#" class="nav-link active">
              
              <p>
               <i class="fas fa-cogs"></i>
               Usuarios
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/users/')}}" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Crear usuario</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="{{ url('/roles/')}}" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Roles y permisos</p>
                </a>
              </li>
            </ul>
          </li>
          @endcan
          <p></p>
          
          <li class="nav-item bg-danger boton2">
                <a type="button" class="nav-link" id="cerrarsesion">

                  <i class="fas fa-sign-out-alt"></i>
                  <p>Cerrar sesión</p>
                </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">


        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                @include('sweetalert::alert')

                @yield('contenido')

            </div>
        </div>
    </div>
</div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<script>
   $("#cerrarsesion").click(function(e){
    swal({
     title:"¿Estás seguro de que quieres cerrar la sesión?",
     text:"",
     icon:"warning",
     buttons:true,
     dangerMode:true,
     })
     .then((willDelete)=>{
     if(willDelete){
      
      location.href ="{{route('logout')}}";      
         }
       }); 
   });
</script>
<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('dist/js/alertify.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.2/js/dataTables.rowGroup.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>


<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->

<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('js/chosen.jquery.js')}}"></script>
<script src="{{asset('js/chosen.jquery.min.js')}}"></script>

<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
</body>
</html>
