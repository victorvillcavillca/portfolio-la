@extends('layouts.blog')
@section('styles')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
@endsection

@section('content')
<div class="container">
    <!--Breadcrumbs-->
    @php $name = 'matter-detail' @endphp
    @include('web.partials.breadcrumbs',array('name' =>  $name))
    <!--./Breadcrumbs-->

            <!--Section: Post-->
            <section class="mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-8 mb-4">

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">
                                <h3>Bienvenido: </h3>
                                {{ Auth::user()->name }}</p>
                                <hr>
                                <p><strong>Evaluación:</strong>Manual Administrativo</p>
                                <p><strong>Titulo:</strong>Capitulo I MAC</p>
                                <p><strong>Estado:</strong>Disponible  hasta 23/03/2018</p>

                                <hr>
                                <p>Solo tienes un intento, una vez que comienza no hay vuelta atrás.</p>
                                <p>Tiene un máximo de 2 minutos por pregunta.</p>
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('evaluation.index') }}" class="btn btn-info btn-sm">Comenzar</a>
                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                     <!--Grid column-->
                    <div class="col-md-4 mb-4">

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header light-blue lighten-1 white-text text-uppercase font-weight-bold text-center py-2">Artículos Relacionados</div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled">

                                </ul>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: matter-->

        </div>

@endsection

@section('scripts')
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@endsection