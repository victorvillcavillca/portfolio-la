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

                        <!--Featured Image-->
                        {{-- <div class="card mb-4 wow fadeIn">

                            @if($matter->file)
                                <img src="{{ $matter->file }}" class="img-fluid" alt="{{ $matter->name }}">
                            @endif

                        </div> --}}
                        <!--/.Featured Image-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">
                                <h2>{{ $matter->name }}</h2>
                                {{-- <p class="h5 my-4">{{ $matter->name }}</p> --}}


                                <blockquote class="blockquote">
                                    <p class="mb-0">{{ $matter->description }}</p>
                                </blockquote>

                                {{-- {!! $matter->body !!} --}}

                                <hr>

                                {{-- <p class="h5 my-4">Categoría</p>
                                <strong><a href="{{ route('category', $matter->category->slug) }}" class="card-link">{{ $matter->category->name }}</a></strong> --}}
                            </div>


                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">

                        <!--Card : Dynamic content wrapper-->
                        <div class="card mb-4 text-center wow fadeIn">

                            <div class="card-header">¿Usted desea suscribirse para Realizar las Evaluaciones?</div>

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Default form login -->
                                {{-- <form> --}}

                                {!! Form::open(['route' => 'evaluations.store']) !!}





                                    <!-- Default input email -->
                                    <label for="defaultFormEmailEx" class="grey-text">{{ __('E-Mail Address') }}</label>
                                    <input type="email" id="defaultFormLoginEmailEx" class="form-control">

                                    <br>

                                    <!-- Default input password -->
                                    <label for="defaultFormNameEx" class="grey-text">{{ __('Name') }}</label>
                                    <input type="text" id="defaultFormNameEx" class="form-control">

                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">{{ __('Register') }}</button>
                                    </div>
                                {{-- </form> --}}
                                {!! Form::close() !!}
                                <!-- Default form login -->

                            </div>

                        </div>
                        <!--/.Card : Dynamic content wrapper-->

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
  {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script> --}}
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

  {{-- <script src="{{ asset('js/toastr.min.js') }}"></script> --}}
  <!-- page script -->
  <
@endsection