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
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{ asset('vendor/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <!-- <link href="css/mdb.min.css" rel="stylesheet"> -->
    <link href="{{ asset('vendor/mdb/css/mdb.min.css') }}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <!-- <link href="css/style.min.css" rel="stylesheet"> -->
    <link href="{{ asset('vendor/mdb/css/style.css') }}" rel="stylesheet">

    @yield('styles')
</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
 {{--    <header>
        <!-- Sidebar navigation -->
        <div id="slide-out" class="side-nav sn-bg-4 fixed" style="transform: translateX(-100%);">
            <ul class="custom-scrollbar">
                <!-- Logo -->
                <li>
                    <div class="logo-wrapper waves-light waves-effect waves-light">
                        <a href="#"><img src="https://mdbootstrap.com/img/logo/mdb-transparent.png" class="img-fluid flex-center"></a>
                    </div>
                </li>
                <!--/. Logo -->
                <!--Social-->
                <li>
                    <ul class="social">
                        <li><a href="#" class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a></li>
                        <li><a href="#" class="icons-sm pin-ic"><i class="fa fa-pinterest"> </i></a></li>
                        <li><a href="#" class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a></li>
                        <li><a href="#" class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a></li>
                    </ul>
                </li>
                <!--/Social-->
                <!--Search Form-->
                <li>
                    <form class="search-form" role="search">
                        <div class="form-group md-form mt-0 pt-1 waves-light waves-effect waves-light">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </li>
                <!--/.Search Form-->
                <!-- Side navigation links -->
                <li>
                    <ul class="collapsible collapsible-accordion">
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i> Submit blog<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">Submit listing</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Registration form</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i> Instruction<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">For bloggers</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">For authors</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> About<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">Introduction</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Monthly meetings</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> Contact me<i class="fa fa-angle-down rotate-icon"></i></a>
                            <div class="collapsible-body">
                                <ul class="list-unstyled">
                                    <li><a href="#" class="waves-effect">FAQ</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Write a message</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">FAQ</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Write a message</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">FAQ</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Write a message</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">FAQ</a>
                                    </li>
                                    <li><a href="#" class="waves-effect">Write a message</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <!--/. Side navigation links -->
            </ul>
            <div class="sidenav-bg mask-strong"></div>
        </div>
        <!--/. Sidebar navigation -->
        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
            <!-- SideNav slide-out button -->
            <div class="float-left">
                <a href="#" data-activates="slide-out" class="button-collapse black-text"><i class="fa fa-bars"></i></a>
            </div>
            <!-- Breadcrumb-->
            <div class="breadcrumb-dn mr-auto">
                <p>Material Design for Bootstrap</p>
            </div>
            <ul class="nav navbar-nav nav-flex-icons ml-auto">
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light"><i class="fa fa-envelope"></i> <span class="clearfix d-none d-sm-inline-block">Contact</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light"><i class="fa fa-comments-o"></i> <span class="clearfix d-none d-sm-inline-block">Support</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect waves-light"><i class="fa fa-user"></i> <span class="clearfix d-none d-sm-inline-block">Account</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item waves-effect waves-light" href="#">Action</a>
                        <a class="dropdown-item waves-effect waves-light" href="#">Another action</a>
                        <a class="dropdown-item waves-effect waves-light" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.Navbar -->
    </header> --}}

    <header>

        <!-- Navbar -->
        @include('layouts.partials.nav')
        <!-- Navbar -->

        <!-- Sidebar -->
        @include('layouts.partials.sidebar')
        <!-- Sidebar -->

    </header>
    <!--Main Navigation-->


     {{--    @if(count($errors))
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="alert alert-success">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif --}}

    <!--Main layout-->
    <main class="pt-5 mx-lg-7">
        @yield('content')

    </main>
    <!--Main layout-->

    <!--Footer-->
    @include('layouts.partials.footer')
    <!--/.Footer-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/jquery-3.3.1.min.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/popper.min.js') }}"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/bootstrap.min.js') }}"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="{{ asset('vendor/mdb/js/mdb.min.js') }}"></script>

    @yield('scripts')

    <!-- Initializations -->
    <script type="text/javascript">
        // Animations initialization
        // new WOW().init();
        //
        // SideNav Button Initialization
        $(".button-collapse").sideNav();
        // SideNav Scrollbar Initialization
        var sideNavScrollbar = document.querySelector('.custom-scrollbar');
        Ps.initialize(sideNavScrollbar);
    </script>

    <!-- Charts -->
    <script>
        // Line
        // var ctx = document.getElementById("myChart").getContext('2d');
        // var myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        //         datasets: [{
        //             label: '# of Votes',
        //             data: [12, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.2)',
        //                 'rgba(54, 162, 235, 0.2)',
        //                 'rgba(255, 206, 86, 0.2)',
        //                 'rgba(75, 192, 192, 0.2)',
        //                 'rgba(153, 102, 255, 0.2)',
        //                 'rgba(255, 159, 64, 0.2)'
        //             ],
        //             borderColor: [
        //                 'rgba(255,99,132,1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(75, 192, 192, 1)',
        //                 'rgba(153, 102, 255, 1)',
        //                 'rgba(255, 159, 64, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         }
        //     }
        // });

        // //pie
        // var ctxP = document.getElementById("pieChart").getContext('2d');
        // var myPieChart = new Chart(ctxP, {
        //     type: 'pie',
        //     data: {
        //         datasets: [{
        //             data: [300, 50, 100, 40, 120],
        //             backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        //             hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        //         }]
        //     },
        //     options: {
        //         responsive: true
        //     }
        // });


        // //line
        // var ctxL = document.getElementById("lineChart").getContext('2d');
        // var myLineChart = new Chart(ctxL, {
        //     type: 'line',
        //     data: {
        //         labels: ["January", "February", "March", "April", "May", "June", "July"],
        //         datasets: [{
        //                 label: "My First dataset",
        //                 backgroundColor: [
        //                     'rgba(105, 0, 132, .2)',
        //                 ],
        //                 borderColor: [
        //                     'rgba(200, 99, 132, .7)',
        //                 ],
        //                 borderWidth: 2,
        //                 data: [65, 59, 80, 81, 56, 55, 40]
        //             },
        //             {
        //                 label: "My Second dataset",
        //                 backgroundColor: [
        //                     'rgba(0, 137, 132, .2)',
        //                 ],
        //                 borderColor: [
        //                     'rgba(0, 10, 130, .7)',
        //                 ],
        //                 data: [28, 48, 40, 19, 86, 27, 90]
        //             }
        //         ]
        //     },
        //     options: {
        //         responsive: true
        //     }
        // });


        // //radar
        // var ctxR = document.getElementById("radarChart").getContext('2d');
        // var myRadarChart = new Chart(ctxR, {
        //     type: 'radar',
        //     data: {
        //         labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
        //         datasets: [{
        //             label: "My First dataset",
        //             data: [65, 59, 90, 81, 56, 55, 40],
        //             backgroundColor: [
        //                 'rgba(105, 0, 132, .2)',
        //             ],
        //             borderColor: [
        //                 'rgba(200, 99, 132, .7)',
        //             ],
        //             borderWidth: 2
        //         }, {
        //             label: "My Second dataset",
        //             data: [28, 48, 40, 19, 96, 27, 100],
        //             backgroundColor: [
        //                 'rgba(0, 250, 220, .2)',
        //             ],
        //             borderColor: [
        //                 'rgba(0, 213, 132, .7)',
        //             ],
        //             borderWidth: 2
        //         }]
        //     },
        //     options: {
        //         responsive: true
        //     }
        // });

        // //doughnut
        // var ctxD = document.getElementById("doughnutChart").getContext('2d');
        // var myLineChart = new Chart(ctxD, {
        //     type: 'doughnut',
        //     data: {
        //         labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        //         datasets: [{
        //             data: [300, 50, 100, 40, 120],
        //             backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
        //             hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        //         }]
        //     },
        //     options: {
        //         responsive: true
        //     }
        // });
    </script>

    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js"></script>
    <script>
        // Regular map
        // function regular_map() {
        //     var var_location = new google.maps.LatLng(40.725118, -73.997699);

        //     var var_mapoptions = {
        //         center: var_location,
        //         zoom: 14
        //     };

        //     var var_map = new google.maps.Map(document.getElementById("map-container"),
        //         var_mapoptions);

        //     var var_marker = new google.maps.Marker({
        //         position: var_location,
        //         map: var_map,
        //         title: "New York"
        //     });
        // }

        // // Initialize maps
        // google.maps.event.addDomListener(window, 'load', regular_map);
    </script>
</body>

</html>