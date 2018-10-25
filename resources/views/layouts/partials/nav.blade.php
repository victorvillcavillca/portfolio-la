<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/material-design-for-bootstrap/"
            target="_blank">
            <strong class="blue-text">MDB</strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->is('admin/specialty-areas') || request()->is('admin/specialty-areas/*')? 'active' : ''  }}">
                    {{-- <a class="nav-link waves-effect" href="#">Home
                        <span class="sr-only">(current)</span>
                    </a> --}}

                    <a href="{{ route('specialty-areas.index') }}" class="nav-link waves-effect"><i class="fa fa-map mr-3"></i>@lang('menu.specialty_areas')<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ request()->is('admin/specialties') || request()->is('admin/specialties/*')? 'active' : ''  }}">
                    <a href="{{ route('specialties.index') }}" class="nav-link waves-effect"><i class="fa fa-map mr-3"></i>@lang('menu.specialties')<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ request()->is('admin/evaluation-categories') || request()->is('admin/evaluation-categories/*')? 'active' : ''  }}">
                    <a href="{{ route('evaluation-categories.index') }}" class="nav-link waves-effect"><i class="fa fa-map mr-3"></i>@lang('menu.evaluation_categories')<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item {{ request()->is('admin/evaluations') || request()->is('admin/evaluations/*')? 'active' : ''  }}">
                    <a href="{{ route('evaluations.index') }}" class="nav-link waves-effect"><i class="fa fa-map mr-3"></i>@lang('menu.evaluations')<span class="sr-only">(current)</span></a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/material-design-for-bootstrap/"
                        target="_blank">About MDB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/getting-started/" target="_blank">Free
                        download</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="https://mdbootstrap.com/bootstrap-tutorial/" target="_blank">Free
                        tutorials</a>
                </li> --}}
            </ul>

            <!-- Right Side Of Navbar -->
            {{-- <ul class="navbar-nav ml-auto"> --}}
            <ul class="navbar-nav nav-flex-icons">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
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