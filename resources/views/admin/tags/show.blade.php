@extends('layouts.admin-dash')

@section('content')

<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.tags.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Ver etiqueta
                </div>
                <!--Card content-->
                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $tag->name }}</p>
                    <p><strong>Slug</strong> {{ $tag->slug }}</p>
                    <p><strong>Creado: </strong> {{ $tag->created_at }}</p>
                    <hr>
                    <a href="{{ route('tags.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-sign-out"></i> @lang('button.exit')</a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection
