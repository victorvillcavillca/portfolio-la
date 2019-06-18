@extends('layouts.admin-dash')

@section('content')
<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.specialty-solveds.partials.heading')
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
                    <p><strong>Creado</strong> {{ $specialty->created_at }}</p>
                    <hr>
                    <a href="{{ route('specialty-solveds.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-sign-out"></i> @lang('button.exit')</a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
