<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->

  <link href="{{ asset('vendor/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="{{ asset('vendor/mdb/css/style.css') }}" rel="stylesheet">

  <!-- Styles -->
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>

<body>
<div id="app">
  <!-- Start your project here-->
  <div style="height: 100vh">
    <div class="flex-center flex-column">
      <h1 class="animated fadeIn mb-4">Material Design for Bootstrap</h1>

      <h5 class="animated fadeIn mb-3">Thank you for using our product. We're glad you're with us.</h5>

      <p class="animated fadeIn text-muted">MDB Team</p>
    </div>
  </div>

  <main class="py-4">
    @yield('content')
  </main>

  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <!-- <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script> -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/jquery-3.3.1.min.js') }}"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/popper.min.js') }}"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/bootstrap.min.js') }}"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="{{ asset('vendor/mdb/js/mdb.min.js') }}"></script>
  
  <script type="text/javascript">
        // Animations initialization
    new WOW().init();
  </script>

</div>
</body>

</html>
