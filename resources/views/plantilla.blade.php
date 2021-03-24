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

  <title>Registro de Proveedores</title>

  <!-- Font Awesome Icons -->

  <link rel="stylesheet"  href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


@yield('script')
</head>
<body class="hold-transition sidebar-mini">
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
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

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
            </ul>
          </li>
          <p></p>
          <li class="nav-item bg-success boton2">
                <a href="#" class="nav-link">

                  <i class="far fa-clipboard"></i>
                  <p>Hojas de vida cilindros</p>
                </a>
          </li>
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

                <a href="#" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Orden de producción</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">

                <a href="#" class="nav-link">
                  <i class="fas fa-user-check"></i>
                  <p>Certificado producción</p>
                </a>
              </li>
            </ul>
          </li>
           <p></p>
          <li class="nav-item bg-success boton2">
                <a href="#" class="nav-link">

                 <i class="fas fa-cart-arrow-down"></i>
                  <p>Ventas</p>
                </a>
          </li>
          <p></p>
          <li class="nav-item bg-danger boton2">
                <a href="#" class="nav-link">

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

                @yield('contenido')

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

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
