@extends('layouts.admin-dash')

@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.resource-categories.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Ver Categoría de recurso
                </div>
                <!--Card content-->
                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $resource_category->name }}</p>
                    <p><strong>Slug</strong> {{ $resource_category->slug }}</p>
                    <p><strong>Descripción</strong> {{ $resource_category->description }}</p>
                    <p><strong>Creado</strong> {{ $resource_category->created_at }}</p>
                    <hr>
                    <a href="{{ route('resource-categories.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-sign-out"></i> @lang('button.exit')</a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
