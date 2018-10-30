@extends('layouts.tim-admin')

@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.evaluations.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Ver categoría
                </div>
                <!--Card content-->
                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $evaluation->name }}</p>
                    <p><strong>Slug</strong> {{ $evaluation->slug }}</p>
                    <p><strong>Descripción</strong> {{ $evaluation->description }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
