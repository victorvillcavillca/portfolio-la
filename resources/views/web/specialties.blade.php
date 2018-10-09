@extends('layouts.app')

@section('content')

<div class="container">

  {{-- <div class="row">
    <div class="col-4">
      sidebar
    </div>
    <div class="col-6">
      2 of 2
    </div>
  </div> --}}
  


    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action active">
                Cras justo odio
              </a>
              <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
              <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
              <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
              <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
            </div>
        </div>

        <div class="col-md-9">
            <h1>Lista de Especialidades</h1>
            <div class="row">
                @foreach($specialties as $specialty)
                    <div class="col-md-4">
                        <div class="card">
                          @if($specialty->file)
                          <img src="{{ $specialty->file }}" class="card-img-top img-fluid" alt="{{ $specialty->name }}">
                          @endif
                          <div class="card-body">
                            <h5 class="card-title">{{ $specialty->name }}</h5>
                            <p class="card-text">{{ $specialty->description }}</p>
                            {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                            <a href="{{ route('specialty', $specialty->slug) }}" class="btn btn-primary">Leer más</a>
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