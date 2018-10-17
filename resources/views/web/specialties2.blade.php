@extends('layouts.blog')

@section('content')
<div class="container">

    <!--Section: Post-->
    <section class="mt-4">

        <!--Grid row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-8 mb-4">
              <!--Section: Cards-->
              <section class="text-center">
                  <h1>Especialidades del Club Conquistadores</h1>
                  <hr>
                  <!--Grid row-->
                  <div class="row mb-4 wow fadeIn">
                    @foreach($specialties as $specialty)
                        <!--Grid column-->

                        <div class="col-lg-4 col-md-12 mb-4">

                            <!--Card-->
                            <div class="card">

                                <!--Card image-->
                                <div class="text-center">
                                  @if($specialty->file)
                                    <img src="{{ $specialty->file }}" class="img-fluid" alt="{{ $specialty->name }}">
                                  @endif
                                </div>

                                <!--Card content-->
                                <div class="card-body">
                                    <!--Title-->
                                    <h4 class="card-title">{{ $specialty->name }}</h4>
                                    <!--Text-->
                                    <p class="card-text">{{ $specialty->description }}</p>
                                    <a href="{{ $specialty->filename }}" class="btn btn-primary" target="_blank"><i class="fa fa-download"></i> Descargar</a>
                                </div>

                            </div>
                            <!--/.Card-->
                        </div>
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

                    <div class="card-header">Especialidades por Áreas</div>
                    <!--Card content-->
                    <div id="card-body">
                      <div class="list-group">
                        @foreach($specialty_areas as $specialty_area)
                        {{-- @php echo request()->is('admin/specialty-areas'); die(); @endphp --}}
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