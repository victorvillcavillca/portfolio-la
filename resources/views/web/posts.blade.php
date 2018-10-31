@extends('layouts.blog')
@section('content')

<div class="container">
    <!--Breadcrumbs-->
    @php $name = 'blog' @endphp
    @include('web.partials.breadcrumbs',array('name' =>  $name))
    <!--./Breadcrumbs-->

    <!--Section: Jumbotron-->

    <!--Section: Jumbotron-->

    {{-- <hr class="my-5"> --}}

    <!--Section: Cards-->
    <section class="text-center">
        <h2>Blog de los Conquistadores</h2>
        <hr>
        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">
            {{-- @foreach($posts as $post)
            <div class="card">
                <div class="card-header">{{ $post->name }}</div>

                <div class="card-body">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                    @endif

                    {{ $post->excerpt }}
                    <a href="{{ route('post', $post->slug) }}" class="card-link">Leer más</a>
                </div>
            </div>
            @endforeach

            {{ $posts->links() }} --}}

            @foreach($posts as $post)
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <!--Card-->
                <div class="card">

                    <!--Card image-->
{{--                     <div class="view overlay"> --}}
                    <div class="text-center">
                        @if($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                        @endif
                    </div>

                    <!--Card content-->
                    <div class="card-body">
                        <!--Title-->
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <!--Text-->
                        <p class="card-text">{!! $post->excerpt !!}</p>
                        <p class="card-text">
{{--                             <strong><a href="{{ route('post', $post->slug) }}" class="card-link">Leer más</a></strong> --}}
                        <a href="{{ route('post', $post->slug) }}" target="_blank" class="btn btn-default btn-rounded btn-md waves-effect waves-light">Leer más<i class="fa fa-photo ml-2"></i></a>

                        </p>
                    </div>

                    <div class="card-footer">
                        <button>helo</button>
                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->
            @endforeach

            <!--Grid column-->

        </div>
        <!--Grid row-->


        <!--Pagination-->
        <nav class="d-flex justify-content-center wow fadeIn">
            {{ $posts->links() }}
            {{-- <ul class="pagination pg-blue">

                <!--Arrow left-->
                <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>

                <li class="page-item active">
                    <a class="page-link" href="#">1
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">4</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">5</a>
                </li>

                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            </ul> --}}
        </nav>
        <!--Pagination-->

    </section>
    <!--Section: Cards-->

</div>

{{-- <div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

        	<h1>Lista de artículos</h1>

        	@foreach($posts as $post)
            <div class="card">
                <div class="card-header">{{ $post->name }}</div>

                <div class="card-body">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                    @endif

                    {{ $post->excerpt }}
                    <a href="{{ route('post', $post->slug) }}" class="card-link">Leer más</a>
                </div>
            </div>
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</div> --}}
@endsection
