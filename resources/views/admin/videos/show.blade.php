@extends('layouts.admin-dash')

@section('content')
<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.videos.partials.heading')
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
                  @if($video->file)
                    <img style="width: 200px; height: 200px;" src="{{ $video->file }}" class="img-fluid" alt="{{ $video->name }}">
                  @endif
                </div>
                <div class="card-body">
                    <p><strong>Nombre: </strong> {{ $video->name }}</p>
                    <p><strong>URL: </strong> <a href="{{ $video->url }}" target="_blank">{{ $video->url }}</a></p>
                    <p><strong>Orden: </strong> {{ $video->order }}</p>
                    <p><strong>Descripción: </strong> {{ $video->description }}</p>
                    <p><strong>Estado: </strong>
                        @if($video->status === 'PUBLISHED')
                            <span class="badge badge-success">Publicado</span>
                            @else
                            <span class="badge badge-danger">Borrador</span>
                            @endif
                    </p>
                    <p><strong>Creado: </strong> {{ $video->created_at }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
