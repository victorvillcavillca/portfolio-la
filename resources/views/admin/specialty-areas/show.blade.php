@extends('layouts.admin-dash')

@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.specialty-areas.partials.heading')
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
                    <p><strong>Nombre</strong> {{ $specialty_area->name }}</p>
                    <p><strong>Slug</strong> {{ $specialty_area->slug }}</p>
                    <p><strong>Descripción</strong> {{ $specialty_area->description }}</p>
                    <p><strong>Creado</strong> {{ $specialty_area->created_at }}</p>
                    <hr>
                    <a href="{{ route('specialty-areas.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-sign-out"></i> @lang('button.exit')</a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
