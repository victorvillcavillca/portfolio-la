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
      <li class="nav-item active  ">
        <a class="nav-link" href="#0">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <!-- your sidebar here -->
      <li class="nav-item ">
        <a class="nav-link" href="./user.html">
          <i class="material-icons">person</i>
          <p>User Profile</p>
        </a>
      </li>
      <li class="nav-item active ">
        <a href="{{ route('posts.index') }}" class="nav-link {{ request()->is('admin/posts') || request()->is('admin/posts/*')? 'active' : ''}}">
            <i class="material-icons">content_paste</i>
          <p>Post</p>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./typography.html">
          <i class="material-icons">library_books</i>
          <p>Typography</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./icons.html">
          <i class="material-icons">bubble_chart</i>
          <p>Icons</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./map.html">
          <i class="material-icons">location_ons</i>
          <p>Maps</p>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="./notifications.html">
          <i class="material-icons">notifications</i>
          <p>Notifications</p>
        </a>
      </li>


      <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/posts') || request()->is('admin/posts/*')? 'active' : ''}}">
            <i class="fa fa-map mr-3"></i>Posts</a>
        <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/categories') || request()->is('admin/categories/*')? 'active' : ''}}">
            <i class="fa fa-money mr-3"></i>Categories</a>
        <a href="{{ route('tags.index') }}" class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/tags') || request()->is('admin/tags/*')? 'active' : ''  }}">
            <i class="fa fa-map mr-3"></i>Etiquetas</a>
        <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>@lang('menu.products')</a>
        <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/roles') || request()->is('admin/roles/*')? 'active' : ''  }}">
            <i class="fa fa-map mr-3"></i>@lang('menu.roles')</a>
        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action waves-effect {{ request()->is('admin/users') || request()->is('admin/users/*')? 'active' : ''  }}">
            <i class="fa fa-map mr-3"></i>@lang('menu.users')</a>
      {{-- <li class="nav-item active-pro ">
            <a class="nav-link" href="./upgrade.html">
                <i class="material-icons">unarchive</i>
                <p>Upgrade to PRO</p>
            </a>
        </li> --}}
    </ul>
  </div>
</div>