@extends('layouts.admin-dash')

@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.categories.partials.heading')
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
                    <p><strong>Nombre</strong> {{ $category->name }}</p>
                    <p><strong>Slug</strong> {{ $category->slug }}</p>
                    <p><strong>Descripción</strong> {{ $category->body }}</p>
                    <p><strong>Creado: </strong> {{ $category->created_at }}</p>
                    <hr>
                    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-sign-out"></i> @lang('button.exit')</a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
