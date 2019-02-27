@extends('layouts.admin-dash')

@section('content')
<div class="container-fluid mt-5">
    <!-- Heading -->
    @include('admin.posts.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                {{-- <div class="card-header"> --}}
                <div class="card-header font-weight-bold">Ver Post</div>
                <!--Card content-->
                <div class="text-center">
                  @if($post->file)
                    <img style="width: 200px; height: 200px;" src="{{ $post->file }}" class="img-fluid" alt="{{ $post->name }}">
                  @endif
                </div>
                <div class="card-body">
                    <p><strong>Nombre: </strong> {{ $post->name }}</p>
                    <p><strong>Slug: </strong> {{ $post->slug }}</p>
                    <p><strong>Resumen: </strong></p> {!! $post->excerpt !!}
                    <p><strong>Estado: </strong>
                        @if($post->status === 'PUBLISHED')
                            <span class="badge badge-success">Publicado</span>
                            @else
                            <span class="badge badge-danger">Borrador</span>
                            @endif
                    </p>
                    <p><strong>Descripción: </strong></p>{!! $post->body !!}
                    <p><strong>Creado: </strong> {{ $post->created_at }}</p>
                    <hr>
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-sign-out"></i> @lang('button.exit')</a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
