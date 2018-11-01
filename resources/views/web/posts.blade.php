@extends('layouts.blog')
@section('content')

<div class="container">
    <!--Breadcrumbs-->
    @php $name = 'blog' @endphp
    @include('web.partials.breadcrumbs',array('name' =>  $name))
    <!--./Breadcrumbs-->

    <!--Section: Cards-->
    <section class="text-center">
        <h2>Blog de los Conquistadores</h2>
        <hr>
        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

            @foreach($posts as $post)
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <!--Card-->
                <div class="card">

                    <div class="text-center">
                        @if($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                        @endif
                    </div>

                    <!--Card content-->
                    <div class="card-body">
                        <p class="text-left">January 1, 2014 by <a href="#">Mark</a></p>
                        <!--Title-->
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <!--Text-->
                        <p class="card-text">{!! $post->excerpt !!}</p>
                        <p class="card-text">
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
        </nav>
        <!--Pagination-->

    </section>
    <!--Section: Cards-->

</div>
@endsection
