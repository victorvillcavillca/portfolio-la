@extends('layouts.dashboard')

@section('content')
<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.specialties.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Ver Especialidad
                </div>
                <!--Card content-->
                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $specialty->name }}</p>
                    <p><strong>Slug</strong> {{ $specialty->slug }}</p>
                    <p><strong>Descripción</strong> {{ $specialty->description }}</p>
                    <p><strong>body</strong> {{ $specialty->body }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
