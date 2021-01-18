<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{isset($pageTitle)?$pageTitle:''}} || {{systemInformation()->name}}</title>
    <link rel="stylesheet" href="{{url('public/lte')}}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{url('public/lte')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{url('public/lte')}}/dist/css/adminlte.min.css">
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    {{-- <link rel="stylesheet" href="{{url('public/lte')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.css"> --}}

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/fc-3.3.1/fh-3.1.7/r-2.2.5/sc-2.0.2/datatables.min.css"/>


    <link rel="stylesheet" href="{{url('public/lte')}}/jquery-confirm/jquery-confirm.min.css">
    
    <link rel="stylesheet" href="{{url('public/lte')}}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{url('public/lte')}}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="{{url('public/lte')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    
    <link rel="stylesheet" href="{{url('public/lte')}}/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css"/>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link rel="stylesheet" href="{{url('public/lte')}}/wnoty/wnoty.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="icon" href="{{ url('public/system-images/icons/'.systemInformation()->icon) }}" type="image/png">

    @include('layouts.css')
    @include('layouts.js')

    
</head>
<body class="sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="background: #05376d !important">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" style="color: #f8f9fa"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <ol class="breadcrumb float-sm-right" style="margin-bottom: 0px;">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      @include('layouts.where')
    </ol>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="{{ adminImage(auth()->user()) }}" width="40" height="40" class="rounded-circle" style="margin-top: -10px">
        </a>
        <div class="dropdown-menu" style="margin-left: -100px;margin-top: 5px;" aria-labelledby="navbarDropdownMenuLink">
          <a href="{{ url('setups/my-image') }}" class="dropdown-item">
            <i class="fa fa-upload nav-icon"></i>&nbsp;My Image
          </a>
          <a href="{{ url('setups/my-preferences') }}" class="dropdown-item">
            <i class="fa fa-tasks nav-icon"></i>&nbsp;My Preferences
          </a>
          <a href="{{ url('setups/change-password') }}" class="dropdown-item">
            <i class="fa fa-user nav-icon"></i>&nbsp;Change Password
          </a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fa fa-sign-out-alt nav-icon"></i>&nbsp;Log Out
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </a>
        </div>
      </li>   
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <!-- Main content -->
    <section class="content" style="padding-top: 25px">
      <div class="container-fluid">
        @include('tools.modals')
        @yield('content')
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  {{-- <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="#">VPN</a></strong>
    &nbsp;
    All rights reserved.
    
     <strong style="float:right">Developed By <a href="https://thelarasoft.com">LaraSoft Limited</a> &nbsp; Dev Team</strong>
   
  </footer> --}}
</div>
<!-- ./wrapper -->



</body>
</html>
