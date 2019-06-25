@extends('layouts.blog')

@section('content')
<div class="container">
  <!--Breadcrumbs-->
  @include('web.partials.breadcrumbs',array('name' =>  $name_bread))
  <!--./Breadcrumbs-->

    <!--Section: Post-->
    <section class="mt-4">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-4">
              <div class="page-header">
                  <h3>Buscar especialidad
                    {{ Form::open(['route' => 'specialties', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
                        <div class="form-group">
                            <input type="text" id="name" name="name" value="<?php if(isset($_GET["name"])){ echo $_GET["name"]; }?>" class="form-control" placeholder="Nombre especialidad">
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Buscar">
                            <i class="fas fa-search"></i>
                          </button>

                          <a href="{{ route('specialties') }}" class="btn btn-sm btn-default"><i class="fa fa-refresh" data-toggle="tooltip" data-placement="top" title="Resetear"></i></a>
                        </div>
                    {{ Form::close() }}
                  </h2>
              </div>
              <hr>

              <!--Section: Cards-->
              <section class="text-center">
                  @if(isset($area_name))
                  <h1>{{ $area_name }}</h1>
                  @endif
                  <h2>Especialidades del Club Conquistadores</h2>
                  <hr>
                  <!--Grid row-->
                  <div class="row mb-4 wow fadeIn">
                    @foreach($specialties as $specialty)
                      <!--Grid column-->
                      @include('web.partials.card-specialty', $specialty)
                      <!--Grid column-->
                    @endforeach

                  </div>
                  <!--Grid row-->

                  <!--Pagination-->
                  <nav class="d-flex justify-content-center wow fadeIn">
                      {{ $specialties->links() }}
                  </nav>
                  <!--Pagination-->

              </section>
              <!--Section: Cards-->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-4 mb-4">

                <!--Card-->
                <div class="card mb-4 wow fadeIn">
                      {{-- darken-3 --}}
                    <div class="card-header teal white-text text-uppercase font-weight-bold text-center py-2">Especialidades por Áreas</div>
                    <!--Card content-->

                    <div id="card-body">
                      <div class="list-group">
                        @foreach($specialty_areas as $specialty_area)
                        <a href="{{ route('specialty-area', $specialty_area->slug) }}" class="list-group-item list-group-item-action {{ request()->slug == $specialty_area->slug ? 'active' : ''  }}">{{ $specialty_area->name }}</a>
                        @endforeach
                      </div>

                    </div>

                </div>
                <!--/.Card-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

    </section>
    <!--Section: Post-->

</div>
@endsection