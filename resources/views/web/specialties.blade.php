@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
              @foreach($specialty_areas as $specialty_area)
                <a href="{{ route('specialty-area', $specialty_area->slug) }}" class="list-group-item list-group-item-action">
                        {{ $specialty_area->name }}
                    </a>

                   {{--  <a href="{{ route('studies.index') }}" class="nav-link {{ request()->is('admin/studies') || request()->is('admin/studies/*')? 'active' : ''  }}">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Estudios</p>
                </a> --}}

                    {{--  --}}
                {{-- <a href="#" class="list-group-item list-group-item-action">{{ $specialty_area->name }}</a> --}}
              @endforeach
              {{-- <a href="#" class="list-group-item list-group-item-action active">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
              <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
              <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a> --}}
            </div>
        </div>

        <div class="col-md-9">
            <h1>Lista de Especialidades</h1>
            <div class="row">
                @foreach($specialties as $specialty)
                    <div class="col-md-3">
                        <div class="card">
                          @if($specialty->file)
                          <img src="{{ $specialty->file }}" class="card-img-top img-fluid" alt="{{ $specialty->name }}">
                          @endif
                          <div class="card-body">
                            <h5 class="card-title">{{ $specialty->name }}</h5>
                            <p class="card-text">{{ $specialty->description }}</p>

                            {{-- <a href="{{ URL::to('admin/excel/bathincomes?start_date='.$start_date.'&end_date='.$end_date.'') }}" class="btn btn-primary"><i class='fa fa-download'></i> {!! trans('site/menu.download') !!}</a> --}}

                            <a href="{{ $specialty->filename }}" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i> Descargar</a>
                          </div>
                        </div>
                    </div>
                @endforeach
            {{ $specialties->links() }}
            </div>

        	{{-- @foreach($specialties as $specialty)
            <div class="card">
                <div class="card-header">{{ $specialty->name }}</div>

                <div class="card-body">
                    @if($specialty->file)
                        <img src="{{ $specialty->file }}" class="img-fluid" alt="Responsive image">
                    @endif

                    {{ $specialty->description }}
                    <a href="{{ route('specialty', $specialty->slug) }}" class="card-link">Leer más</a>
                </div>

            </div>
            <hr>
            @endforeach

            {{ $specialties->links() }} --}}
        </div>
    </div>
</div>
@endsection