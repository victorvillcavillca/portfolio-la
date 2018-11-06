@extends('layouts.tim-admin')

@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.managements.partials.heading')
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
                    <p><strong>Nombre</strong> {{ $management->name }}</p>
                    <p><strong>Slug</strong> {{ $management->slug }}</p>
                    <p><strong>Descripción</strong> {{ $management->description }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
