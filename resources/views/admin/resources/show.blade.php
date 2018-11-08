@extends('layouts.admin-dash')

@section('content')
<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.resources.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                {{-- <div class="card-header"> --}}
                <div class="card-header font-weight-bold">Ver Recurso</div>
                <!--Card content-->
                <div class="text-center">
                  @if($resource->file)
                    <img style="width: 200px; height: 200px;" src="{{ $resource->file }}" class="img-fluid" alt="{{ $resource->name }}">
                  @endif
                </div>
                <div class="card-body">
                    <p><strong>Nombre: </strong> {{ $resource->name }}</p>
                    <p><strong>Slug: </strong> {{ $resource->slug }}</p>
                    <p><strong>Orden: </strong> {{ $resource->order }}</p>
                    <p><strong>Descripción: </strong> {{ $resource->description }}</p>
                    <p><strong>Estado: </strong>
                        @if($resource->status === 'PUBLISHED')
                            <span class="badge badge-success">Publicado</span>
                            @else
                            <span class="badge badge-danger">Borrador</span>
                            @endif
                    </p>
                    <p><strong>body: </strong> {{ $resource->body }}</p>
                    <p><strong>Creado: </strong> {{ $resource->created_at }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
