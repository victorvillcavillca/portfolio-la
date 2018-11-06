<div class="dark-font">
    {{-- <ol class="breadcrumb primary-color">
        <li class="breadcrumb-item"><a class="white-text" href="{{ url('/') }}">Inicio</a></li>
        <li class="breadcrumb-item"><a class="white-text" href="#">Library</a></li>
        <li class="breadcrumb-item active">Blog</li>
    </ol> --}}

    {{ Breadcrumbs::render($name) }}
</div>
@section('scripts')
  <script>
    // $('.breadcrumb').addClass('primary-color');
    // $('.breadcrumb-item > a').addClass('white-text');
  </script>
@endsection