@extends('layouts.admin-dash')

@section('content')

<div class="container-fluid mt-5">

    <!-- Alerts -->
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.posts.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">

                <div class="card-header">
                    Crear Publicación
                </div>

                <!--Card content-->
                <div class="card-body">
                    {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}

                        @include('admin.posts.partials.form')

                    {!! Form::close() !!}
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
