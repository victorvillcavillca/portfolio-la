<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('vendor/tim-admin/assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('vendor/tim-admin/assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->



  <link href="{{ asset('vendor/tim-admin/assets/css/material-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
  <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
  @yield('styles')
</head>

<body class="">
  <div class="wrapper">
    <!-- Sidebar -->
    @include('layouts.partials-tim.sidebar')
    <!-- End Sidebar -->

    <div class="main-panel">
      <!-- Navbar -->
      @include('layouts.partials-tim.nav')
      <!-- End Navbar -->

      <div class="content">
          <!-- your content here -->
          @yield('content')

      </div>

      <!-- Footer -->
      @include('layouts.partials-tim.footer')
      <!-- End Footer -->
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('vendor/tim-admin/assets/js/core/jquery.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/tim-admin/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/tim-admin/assets/js/core/bootstrap-material-design.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('vendor/tim-admin/assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  {{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
  <!-- Chartist JS -->
  <script src="{{ asset('vendor/tim-admin/assets/js/plugins/chartist.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('vendor/tim-admin/assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('vendor/tim-admin/assets/js/material-dashboard.min.js') }}" type="text/javascript"></script>

  @yield('scripts')
</body>

</html>