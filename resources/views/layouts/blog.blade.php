<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    {{-- <link href="{{ asset('vendor/mdb/css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <!-- Material Design Bootstrap -->
    <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{ asset('vendor/blog/css/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body class="grey lighten-3">
    {{-- min-height: 100vh --}}
    <div id="app">

        <!--Main Navigation-->
        <header>

            <!-- Navbar -->
            @include('layouts.partials_blog.nav')
            <!-- Navbar -->

        </header>
        <!--Main Navigation-->

        <!--Main layout-->
        <main class="mt-5 pt-5" style="min-height: 80vh;">
            @yield('content')
        </main>
        <!--Main layout-->

        <!--Footer-->
        @include('layouts.partials_blog.footer')
        <!--/.Footer-->
    </div>

    <!-- SCRIPTS -->
    <!-- JQuery -->
    {{-- <script type="text/javascript" src="{{ asset('vendor/mdb/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript --> --}}


    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/mdb.min.js') }}"></script>

    @yield('scripts')

    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        new WOW().init();
    </script>
</body>

</html>