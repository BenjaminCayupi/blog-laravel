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

  <title>Dashboard | {{ Auth::user()->name }}</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/" class="nav-link">Inicio</a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/home" class="brand-link ml-3">
        <span class="brand-text font-weight-bolder">Blog</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="" class="d-block">{{ Auth::user()->name }}</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if ((auth()->user()->role_id) == 2)
            {{-- {{auth()->user()->role_id}} --}}
            <li class="nav-item has-treeview menu-open">
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('crearpost')}}" class="nav-link {{ (request()->is('crear')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Crear Post</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('listpost') }}"
                    class="nav-link {{ (request()->is('lista-post')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Ver Post</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('estadisticas')}}"
                    class="nav-link {{ (request()->is('estadisticas')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-chart-line"></i>
                    <p>Estadisticas</p>
                  </a>
                </li>
              </ul>
            </li>
            @else
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link  {{ (request()->is('crear') or request()->is('lista-post')) ? 'active' : '' }} ">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>
                  Posts
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('crearpost')}}" class="nav-link {{ (request()->is('crear')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Crear Post</p>
                  </a>

                </li>
                <li class="nav-item">
                  <a href="{{ route('listpost') }}"
                    class="nav-link {{ (request()->is('lista-post')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Ver Post</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link {{ (request()->is('crear-categoria') or request()->is('lista-categoria')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-list-alt"></i>
                <p>
                  Categorias
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('crearcateg') }}" class="nav-link {{ (request()->is('crear-categoria')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Crear Categoria</p>
                  </a>

                </li>
                <li class="nav-item">
                  <a href="{{ route('mostrarcateg') }}" class="nav-link {{ (request()->is('lista-categoria')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Ver Categorias</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link {{ (request()->is('lista-usuarios')) ? 'active' : '' }}">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('mostraruser') }}" class="nav-link {{ (request()->is('lista-usuarios')) ? 'active' : '' }}">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Ver Usuarios</p>
                  </a>

                </li>

              </ul>
            </li>

            @endif
            <li class="nav-item">
              <a class="nav-link" style="background-color: #dc3545;
              color:white;" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt ml-1 mr-2"></i>
                <p>{{ __('Cerrar Sesion') }}</p>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
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
        @yield('header')
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            @yield('content')
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
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
  <script src="{{asset('adminlte/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('adminlte/dist/js/adminlte.min.js')}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset('adminlte/dist/js/demo.js')}}"></script>
  <!-- Summernote -->
  <script src="{{asset('adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
  <!-- DataTables -->
  <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
  @yield('script')
</body>

</html>
