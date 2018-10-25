@extends('layouts.dashboard')

@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.evaluation-categories.partials.heading')
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
                    <p><strong>Nombre</strong> {{ $evaluationCategory->name }}</p>
                    <p><strong>Slug</strong> {{ $evaluationCategory->slug }}</p>
                    <p><strong>Descripción</strong> {{ $evaluationCategory->description }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
