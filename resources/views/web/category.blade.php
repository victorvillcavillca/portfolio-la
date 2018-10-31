@extends('layouts.blog')

@section('content')
<div class="container">
    <!--Breadcrumbs-->
    @include('web.partials.breadcrumbs',array('name' =>  $name_bread))
    <!--./Breadcrumbs-->

    <!--Section: Cards-->
    <section class="pt-5">

        <!--Grid row-->
        @foreach($posts as $post)
        <div class="row wow fadeIn">
            <!--Grid column-->
            <div class="col-lg-5 col-xl-4 mb-4">
                <!--Featured image-->
                <div class="view overlay rounded z-depth-1-half">
                    <div class="text-center">
                        @if($post->file)
                        <img src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                        @endif
                    </div>
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-7 col-xl-7 ml-xl-4 mb-4">
                <h3 class="mb-3 font-weight-bold dark-grey-text">
                    <strong>{{ $post->name }}</strong>
                </h3>
                <p>{{ $post->excerpt }}</p>
                <a href="{{ route('post', $post->slug) }}" target="_blank" class="btn btn-default btn-rounded btn-md waves-effect waves-light">Leer más<i class="fa fa-photo ml-2"></i></a>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->

        <hr class="mb-5">
        @endforeach
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