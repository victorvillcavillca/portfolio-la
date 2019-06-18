<nav class="side-navbar">
  <div class="side-navbar-wrapper">
    <!-- Sidebar Header    -->
    <div class="sidenav-header d-flex align-items-center justify-content-center">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center"><img src="{{ asset(auth()->user()->photo) }}" alt="person" class="img-fluid rounded-circle">
        <h2 class="h5">{{ auth()->user()->name }}</h2><span>Web Developer</span>
      </div>
      <!-- Small Brand information, appears on minimized sidebar-->
      <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
    </div>
    <!-- Sidebar Navigation Menus-->
    <div class="main-menu">
      <h5 class="sidenav-heading">Principal</h5>
      <ul id="side-main-menu" class="side-menu list-unstyled">
        {{-- <li><a href="index.html"> <i class="icon-home"></i>Home                             </a></li>
        <li><a href="forms.html"> <i class="icon-form"></i>Forms                             </a></li>
        <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>
        <li><a href="tables.html"> <i class="icon-grid"></i>Tables                             </a></li> --}}
        <li class="{{ request()->is('admin/profiles') || request()->is('admin/profiles/*')? 'active' : ''}}"><a href="{{ route('profiles.index') }}">
            <i class="icon-interface-windows"></i>Profile</a></li>
        <li class="{{ request()->is('admin/home') || request()->is('admin/home/*')? 'active' : ''}}"><a href="{{ route('admin') }}">
            <i class="icon-interface-windows"></i>Inicio</a></li>

        {{-- <li id="menu_scores" class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>VIII CAMPORI MOB (Puntajes)</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="submenu_scores"><a href="{{ URL::to('admin/scores') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/camporiclub.scores') !!}</a></li>
            <li id="submenu_requirement"><a href="{{ URL::to('admin/requirements') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/requirement.requirements') !!}</a></li>
            <li id="submenu_requirementarea"><a href="{{ URL::to('admin/requirementareas') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/requirementarea.requirementareas') !!}</a></li>
            <li id="submenu_camporiclub"><a href="{{ URL::to('admin/camporiclubs') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/club.clubs') !!}</a></li>
            <li id="submenu_qualification"><a href="{{ URL::to('admin/qualifications') }}"><i class="fa fa-circle-o"></i>{!! trans('admin/qualification.qualifications') !!}</a></li>
          </ul>
        </li> --}}

       {{--  <li><a href="#dropdownDropdown_campori" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Campori Regional</a>
          <ul id="dropdownDropdown_campori" class="collapse list-unstyled
            {{ request()->is('admin/scores') || request()->is('admin/scores/*') || request()->is('admin/requirements') || request()->is('admin/requirements/*') || request()->is('admin/requirementareas') || request()->is('admin/requirementareas/*') || request()->is('admin/camporiclubs') || request()->is('admin/camporiclubs/*') || request()->is('admin/qualifications') || request()->is('admin/qualifications/*')? 'show' : ''}}
            ">

            <li class="{{ request()->is('admin/scores') || request()->is('admin/scores/*')? 'active' : ''}}"><a href="{{ route('scores.index') }}">
            <i class="icon-interface-windows"></i>Puntos</a></li>

            <li class="{{ request()->is('admin/requirements') || request()->is('admin/requirements/*')? 'active' : ''}}"><a href="{{ route('requirements.index') }}">
            <i class="icon-interface-windows"></i>Requerimientos</a></li>

            <li class="{{ request()->is('admin/requirementareas') || request()->is('admin/requirementareas/*')? 'active' : ''}}"><a href="{{ route('requirementareas.index') }}">
            <i class="icon-interface-windows"></i>Requerimientos Áreas</a></li>

            <li class="{{ request()->is('admin/camporiclubs') || request()->is('admin/camporiclubs/*')? 'active' : ''}}"><a href="{{ route('camporiclubs.index') }}">
            <i class="icon-interface-windows"></i>Campori Club</a></li>

            <li class="{{ request()->is('admin/qualifications') || request()->is('admin/qualifications/*')? 'active' : ''}}"><a href="{{ route('qualifications.index') }}">
            <i class="icon-interface-windows"></i>Calificaciones</a></li>
          </ul>
        </li> --}}


        <li><a href="#dropdownDropdown_post" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Publicaciones</a>
          <ul id="dropdownDropdown_post" class="collapse list-unstyled
            {{ request()->is('admin/posts') || request()->is('admin/posts/*') || request()->is('admin/categories') || request()->is('admin/categories/*') || request()->is('admin/tags') || request()->is('admin/tags/*')? 'show' : ''}}
            ">

            <li class="{{ request()->is('admin/posts') || request()->is('admin/posts/*')? 'active' : ''}}"><a href="{{ route('posts.index') }}">
            <i class="icon-interface-windows"></i>Posts</a></li>

            <li class="{{ request()->is('admin/categories') || request()->is('admin/categories/*')? 'active' : ''}}"><a href="{{ route('categories.index') }}">
            <i class="icon-interface-windows"></i>Categorias</a></li>

            <li class="{{ request()->is('admin/tags') || request()->is('admin/tags/*')? 'active' : ''}}"><a href="{{ route('tags.index') }}">
            <i class="icon-interface-windows"></i>Etiquetas</a></li>
          </ul>
        </li>

        <li><a href="#dropdownDropdown_evaluation" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Evaluaciones</a>
          <ul id="dropdownDropdown_evaluation" class="collapse list-unstyled
            {{ request()->is('admin/inscriptions') || request()->is('admin/inscriptions/*') || request()->is('admin/evaluations') || request()->is('admin/evaluations/*') || request()->is('admin/questions') || request()->is('admin/questions/*') || request()->is('admin/matters') || request()->is('admin/matters/*') || request()->is('admin/managements') || request()->is('admin/managements/*') ? 'show' : ''}}
            ">

            <li class="{{ request()->is('admin/inscriptions') || request()->is('admin/inscriptions/*')? 'active' : ''}}"><a href="{{ route('inscriptions.index') }}">
            <i class="icon-interface-windows"></i>Inscripciones</a></li>

            <li class="{{ request()->is('admin/evaluations') || request()->is('admin/evaluations/*')? 'active' : ''}}"><a href="{{ route('evaluations.index') }}">
            <i class="icon-interface-windows"></i>Evaluaciones</a></li>

            <li class="{{ request()->is('admin/questions') || request()->is('admin/questions/*')? 'active' : ''}}"><a href="{{ route('questions.index') }}">
            <i class="icon-interface-windows"></i>Preguntas</a></li>

            <li class="{{ request()->is('admin/matters') || request()->is('admin/matters/*')? 'active' : ''}}"><a href="{{ route('matters.index') }}">
            <i class="icon-interface-windows"></i>Materias</a></li>

            <li class="{{ request()->is('admin/managements') || request()->is('admin/managements/*')? 'active' : ''}}"><a href="{{ route('managements.index') }}">
            <i class="icon-interface-windows"></i>Gestiones</a></li>
          </ul>
        </li>

        <li><a href="#dropdownDropdown_specialty" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Conquistadores</a>
          <ul id="dropdownDropdown_specialty" class="collapse list-unstyled {{ request()->is('admin/specialties') || request()->is('admin/specialties/*') || request()->is('admin/specialty-solveds') || request()->is('admin/specialty-solveds/*') || request()->is('admin/specialty-areas') || request()->is('admin/specialty-areas/*') || request()->is('admin/resources') || request()->is('admin/resources/*') || request()->is('admin/resource-categories') || request()->is('admin/resource-categories/*') || request()->is('admin/videos') || request()->is('admin/videos/*') || request()->is('admin/video-categories') || request()->is('admin/video-categories/*') ? 'show' : ''}}
            ">

            <li class="{{ request()->is('admin/specialties') || request()->is('admin/specialties/*')? 'active' : ''}}"><a href="{{ route('specialties.index') }}">
            <i class="icon-interface-windows"></i>Especialidades</a></li>

            <li class="{{ request()->is('admin/specialty-solveds') || request()->is('admin/specialty-solveds/*')? 'active' : ''}}"><a href="{{ route('specialty-solveds.index') }}">
            <i class="icon-interface-windows"></i>Esp. Resueltas</a></li>

            <li class="{{ request()->is('admin/specialty-areas') || request()->is('admin/specialty-areas/*')? 'active' : ''}}"><a href="{{ route('specialty-areas.index') }}">
            <i class="icon-interface-windows"></i>Áreas Especialidades</a></li>

            <li class="{{ request()->is('admin/resources') || request()->is('admin/resources/*')? 'active' : ''}}"><a href="{{ route('resources.index') }}">
            <i class="icon-interface-windows"></i>Recursos</a></li>

            <li class="{{ request()->is('admin/resource-categories') || request()->is('admin/resource-categories/*')? 'active' : ''}}"><a href="{{ route('resource-categories.index') }}">
            <i class="icon-interface-windows"></i>Categorías recursos</a></li>

            <li class="{{ request()->is('admin/videos') || request()->is('admin/videos/*')? 'active' : ''}}"><a href="{{ route('videos.index') }}">
            <i class="icon-interface-windows"></i>Videos</a></li>

            <li class="{{ request()->is('admin/video-categories') || request()->is('admin/video-categories/*')? 'active' : ''}}"><a href="{{ route('video-categories.index') }}">
            <i class="icon-interface-windows"></i>Categorías Videos</a></li>
          </ul>
        </li>

       {{--  <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page                             </a></li>
        <li> <a href="#"> <i class="icon-mail"></i>Demo
            <div class="badge badge-warning">6 New</div></a></li> --}}
      </ul>
    </div>
    <div class="admin-menu">
      <h5 class="sidenav-heading">Roles y Permisos</h5>
      <ul id="side-admin-menu" class="side-menu list-unstyled">
        <li class="{{ request()->is('admin/users') || request()->is('admin/users/*')? 'active' : ''}}"><a href="{{ route('users.index') }}">
            {{-- <i class="icon-user"></i> --}}
            <i class="fa fa-users"></i>
            {{-- <i class="fa fa-table mr-3"></i> --}}
          Usuarios</a></li>

        <li class="{{ request()->is('admin/roles') || request()->is('admin/roles/*')? 'active' : ''}}"> <a href="{{ route('roles.index') }}"> <i class="icon-flask"> </i>Roles
            <div class="badge badge-info">Special</div></a></li>
      </ul>
    </div>
  </div>
</nav>