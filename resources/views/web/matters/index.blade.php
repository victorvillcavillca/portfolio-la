@extends('layouts.blog')
@section('content')

<div class="container">
    <!--Breadcrumbs-->
    @php $name = 'matters' @endphp
    @include('web.partials.breadcrumbs',array('name' =>  $name))
    <!--./Breadcrumbs-->

    <!--Section: Cards-->
    <section class="text-center">
        <h2>Materias</h2>
        <hr>
        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

            @foreach($matters as $matter)
            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <!--Card-->
                <div class="card">

                    <div class="text-center">
                        @if($matter->file)
                        <img src="{{ $matter->file }}" class="img-fluid" alt="{{ $matter->name }}">
                        @endif
                    </div>

                    <!--Card content-->
                    <div class="card-body">
                        <p class="text-left">{{ $matter->created_at }} by <a href="#">{{ $matter->user['name']}}</a></p>
                        <!--Title-->
                        <h5 class="card-title">{{ $matter->name }}</h5>
                        <!--Text-->
                        {{-- <p class="card-text">{!! $matter->excerpt !!}</p> --}}
                        <p class="card-text">
                            <a href="{{ route('matter', $matter->slug) }}" {{-- target="_blank" --}} class="btn btn-default btn-rounded btn-md waves-effect waves-light">Leer más<i class="fa fa-photo ml-2"></i></a>
                        </p>
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
            {{ $matters->links() }}
        </nav>
        <!--Pagination-->

    </section>
    <!--Section: Cards-->

</div>
@endsection
