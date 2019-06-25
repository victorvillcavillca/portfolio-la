<nav class="navbar fixed-top navbar-expand-lg navbar-dark mdb-color darken-3 scrolling-navbar">
    {{-- navbar navbar-expand-lg navbar-dark default-color ie-nav --}}
    <div class="container">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="{{ url('/') }}">
            <strong class="white-text">{{ config('app.name', 'Laravel') }}</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">

                {{-- <li class="nav-item {{ request()->is('admin/specialty-areas') || request()->is('admin/specialty-areas/*')? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ url('/') }}">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li> --}}

                {{-- <li class="nav-item {{ (request()->is('home') || request()->is('home/*')) || (request()->is('post') || request()->is('post/*'))? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('home') }}">Inicio</a>
                </li> --}}

                @guest

                @else
                <li class="nav-item {{ (request()->is('home') || request()->is('home/*')) }}">
                    <a class="nav-link waves-effect" href="{{ route('home') }}">Inicio</a>
                </li>
                <li class="nav-item {{ request()->is('specialties-solved') || request()->is('specialty-area/*')? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('specialties-solved') }}">Esp. Resueltas</a>
                </li>
                @endguest

                 <li class="nav-item {{ (request()->is('blog') || request()->is('blog/*')) || (request()->is('post') || request()->is('post/*'))? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('blog') }}">Blog</a>
                </li>

                {{-- <li class="nav-item {{ (request()->is('read') || request()->is('read/*')) || (request()->is('post') || request()->is('post/*'))? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('read') }}">{{ Auth::user()->name }}</a>
                </li> --}}
                <li class="nav-item {{ request()->is('specialties') || request()->is('specialty-area/*')? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('specialties') }}">Especialidades</a>
                </li>
                <li class="nav-item {{ request()->is('resources') || request()->is('resource-category/*')? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('resources') }}">Recursos</a>
                </li>
                <li class="nav-item {{ request()->is('videos') || request()->is('video-category/*')? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('videos') }}">Videos</a>
                </li>

{{--                 <li class="nav-item {{ request()->is('matters') || request()->is('video-category/*')? 'active' : ''  }}">
                    <a class="nav-link waves-effect" href="{{ route('matters') }}">Evaluaciones </a>
                </li> --}}

               {{--  <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/getting-started/">Free download</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/bootstrap-tutorial/">Free tutorials</a>
                </li> --}}
            </ul>

            <!-- Right -->
{{--             <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fa fa-facebook"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="https://github.com/mdbootstrap/bootstrap-material-design" class="nav-link border border-light rounded waves-effect"
                        target="_blank">
                        <i class="fa fa-github mr-2"></i>MDB GitHub
                    </a>
                </li>
            </ul> --}}

            <!-- Right Side Of Navbar -->
            {{-- <ul class="navbar-nav ml-auto"> --}}
            <ul class="navbar-nav nav-flex-icons">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link border border-light rounded waves-effect" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link border border-light rounded waves-effect" href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>

    </div>
</nav>