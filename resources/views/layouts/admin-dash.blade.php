<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bootstrap Dashboard by Bootstrapious.com</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/admin-dash/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/admin-dash/vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ asset('vendor/admin-dash/css/fontastic.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ asset('vendor/admin-dash/css/grasp_mobile_progress_circle-1.0.0.min.css') }}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="{{ asset('vendor/admin-dash/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('vendor/admin-dash/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('vendor/admin-dash/css/custom.css') }}">

    {{-- <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet"> --}}

    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('vendor/admin-dash/img/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    @yield('styles')
  </head>
  <body>
    <!-- Side Navbar -->
    @include('layouts.partials-admin-dash.sidebar')
    <!-- ./Side Navbar -->

    <div class="page">

      <!-- navbar-->
      <header class="header">
        @include('layouts.partials-admin-dash.nav')
      </header>
      <!-- ./navbar-->

      <!-- Main content-->
      {{-- <main class="pt-5 mx-lg-7"> --}}
      <main class="content">
        @yield('content')
      </main>
      <!-- ./Main content-->

      <!-- Footer -->
      <footer class="main-footer">
        @include('layouts.partials-admin-dash.footer')
      </footer>
      <!-- ./Footer -->

    </div>
    <!-- JavaScript files-->
    <script src="{{ asset('vendor/admin-dash/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/admin-dash/vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/admin-dash/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/admin-dash/js/grasp_mobile_progress_circle-1.0.0.min.js') }}"></script>
    <script src="{{ asset('vendor/admin-dash/vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/admin-dash/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendor/admin-dash/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/admin-dash/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/admin-dash/js/charts-home.js') }}"></script> --}}
    <!-- Main File-->
    <script src="{{ asset('vendor/admin-dash/js/front.js') }}"></script>

    @yield('scripts')
  </body>
</html>