<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script>window.Laravel={csrfToken:'{{csrf_token()}}'}</script>
  <title>{{ config('app.name', 'Learning Exchange')}} - @yield('title')</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="https://fonts.gstatic.com">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
  @stack('css')
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>LE</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Learning</b>Exchange</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle " data-toggle="push-menu" role="button">
          <i class="fas fa-bars"></i>
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            @if (Auth::user())



              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fas fa-user-circle"></i>
                  {{Auth::user()->getFullname()}}
                </a>
                <ul class="dropdown-menu scale-up">
                  <!-- User image -->
                  <li class="user-header">
                      <img class="rounded float-left" style="width:100px; " src="{{Auth::user()->getImage()}}" alt="User profile picture">

                    <p>
                      {{Auth::user()->getFullname()}}
                      <small>Member since April . 2016</small>
                    </p>
                  </li>
                  <li class="user-footer row mx-auto">
                    <div class="col-md-6">

                      <a href="/admin/myProfile" class="btn btn-block btn-primary"><i class="fas fa-user-circle"></i> Profile</a>
                    </div>
                    <div class="col-md-6">
                      <a class="btn btn-block btn-danger" href="{{ route('customLogout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          <i class="fas fa-sign-out-alt"></i>  {{ __('Logout') }}
                      </a>
                    </div>
                    <form id="logout-form" action="{{ route('customLogout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>

                  </li>
                </ul>
              </li>
            @else

              <li class="user-menu-custom">
                <a href="/login" class="">
                  <i class="fas fa-sign-in-alt" aria-hidden="true"></i>

                  <span>Login</span>
                </a>
              </li>
            @endif

          </ul>
        </div>
      </nav>
    </header>

    <!-- Left side column. contains the sidebar -->
    @include('includes.sideNavbar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>@yield('title')</h1>
        {{-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Examples</a></li>
        <li class="breadcrumb-item active">Blank page</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      @include('includes.messages')

      @yield('content')

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right d-none d-sm-inline-block">
    </div> Copyright &copy; {{date("Y")}} <a href="https://dlf.org.uk/">Disabled Living Foundation</a>. All Rights Reserved.
  </footer>


</div>
<!-- ./wrapper -->


<script src="{{ asset('js/adminTheme.js') }}" defer></script>
<script src="{{ asset('js/lms.js') }}" defer></script>
@stack('js')
</body>

</html>
