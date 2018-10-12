<div class="sidebar-fixed position-fixed">

    <a class="logo-wrapper waves-effect">
        <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
    </a>

    <div class="list-group list-group-flush">
        <a href="{{ route('admin') }}" class="list-group-item active waves-effect">
            <i class="fa fa-pie-chart mr-3"></i>Dashboard
        </a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-user mr-3"></i>Profile</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-table mr-3"></i>Tables</a>
        <a href="{{ route('posts.index') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>Posts</a>
        <a href="{{ route('categories.index') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-money mr-3"></i>Categories</a>
        <a href="{{ route('tags.index') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>Etiquetas</a>
        <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>@lang('menu.products')</a>
        <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>@lang('menu.roles')</a>
        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-map mr-3"></i>@lang('menu.users')</a>
    </div>

</div>