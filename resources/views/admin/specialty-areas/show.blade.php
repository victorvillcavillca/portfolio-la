@extends('layouts.dashboard')

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
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
