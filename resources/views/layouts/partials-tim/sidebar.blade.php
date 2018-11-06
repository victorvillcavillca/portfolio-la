
<div class="sidebar" data-color="azure" data-background-color="white">
  <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
  <div class="logo">
    <a href="http://www.creative-tim.com" class="simple-text logo-normal">
      Creative Tim
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item nav-profile">
        <div class="nav-link">
          <div class="user-wrapper">
            <div class="profile-image">
              {{-- <img src="../../images/faces/face1.jpg" alt="profile image"> --}}
            </div>
            <div class="text-wrapper">
              <p class="profile-name">Richard V.Welsh</p>
              <div>
                <small class="designation text-muted">Manager</small>
                <span class="status-indicator online"></span>
              </div>
            </div>
          </div>
          <button class="btn btn-success btn-block">New Project
            <i class="mdi mdi-plus"></i>
          </button>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#0">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <!-- your sidebar here -->
      <li class="nav-item ">
        <a class="nav-link" href="#">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <i class="material-icons">content_paste</i>
          <span class="menu-title">Conquistadores</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ request()->is('admin/specialties') || request()->is('admin/specialties/*')? 'active' : ''}}">
              <a class="nav-link" href="{{ route('specialties.index') }}"><i class="material-icons">content_paste</i>Especialidades</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('admin/specialty-areas') || request()->is('admin/specialty-areas/*')? 'active' : ''}}" href="{{ route('specialty-areas.index') }}"><i class="material-icons">content_paste</i>Áreas de especialidades</a>
            </li>
          </ul>
        </div>
      </li>

      <li class="nav-item {{ request()->is('admin/evaluations') || request()->is('admin/evaluations/*')? 'active' : ''}}">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic-2" aria-expanded="false" aria-controls="ui-basic-2">
          <i class="material-icons">content_paste</i>
          <span class="menu-title">Evaluaciones</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic-2">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item {{ request()->is('admin/inscriptions') || request()->is('admin/inscriptions/*')? 'active' : ''}}">
              <a class="nav-link" href="{{ route('inscriptions.index') }}"><i class="material-icons">content_paste</i>Inscripciones</a>
            </li>

            <li class="nav-item {{ request()->is('admin/evaluations') || request()->is('admin/evaluations/*')? 'active' : ''}}">
              <a class="nav-link" href="{{ route('evaluations.index') }}"><i class="material-icons">content_paste</i>Evaluaciones</a>
            </li>

            {{-- <li class="nav-item {{ request()->is('admin/evaluation-categories') || request()->is('admin/evaluation-categories/*')? 'active' : ''}}">
              <a class="nav-link" href="{{ route('evaluation-categories.index') }}"><i class="material-icons">content_paste</i>Categoría Evaluaciones</a>
            </li> --}}

            <li class="nav-item {{ request()->is('admin/matters') || request()->is('admin/matters/*')? 'active' : ''}}">
              <a class="nav-link" href="{{ route('matters.index') }}"><i class="material-icons">content_paste</i>Materias</a>
            </li>

            <li class="nav-item {{ request()->is('admin/managements') || request()->is('admin/managements/*')? 'active' : ''}}">
              <a class="nav-link" href="{{ route('managements.index') }}"><i class="material-icons">content_paste</i>Gestión</a>
            </li>

            {{-- <li class="nav-item {{ request()->is('admin/questions') || request()->is('admin/questions/*')? 'active' : ''}}">
              <a class="nav-link" href="{{ route('questions.index') }}"><i class="material-icons">content_paste</i>Preguntas</a>
            </li> --}}
          </ul>
        </div>
      </li>


      <li class="nav-item {{ request()->is('admin/posts') || request()->is('admin/posts/*')? 'active' : ''}}">
        <a href="{{ route('posts.index') }}" class="nav-link">
            <i class="material-icons">content_paste</i>
          <p>Posts</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/categories') || request()->is('admin/categories/*')? 'active' : ''}}">
        <a class="nav-link" href="{{ route('categories.index') }}">
          <i class="material-icons">library_books</i>
          <p>Categories</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/tags') || request()->is('admin/tags/*')? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('tags.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>Etiquetas</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/roles') || request()->is('admin/roles/*')? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('roles.index') }}">
          <i class="material-icons">notifications</i>
          <p>@lang('menu.roles')</p>
        </a>
      </li>

      <li class="nav-item {{ request()->is('admin/users') || request()->is('admin/users/*')? 'active' : ''  }}">
        <a class="nav-link" href="{{ route('users.index') }}">
          <i class="material-icons">location_ons</i>
          <p>@lang('menu.users')</p>
        </a>
      </li>

      {{-- <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
                <i class="material-icons">unarchive</i>
                <p>Upgrade to PRO</p>
            </a>
        </li> --}}
    </ul>
  </div>
</div>