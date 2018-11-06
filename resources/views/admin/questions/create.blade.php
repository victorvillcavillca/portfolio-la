@extends('layouts.admin-dash')

@section('content')

<div class="container-fluid mt-5">

    <!-- Alerts -->
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.questions.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">

                <div class="card-header">
                    Crear Preguntas
                </div>

                <!-- errors -->
                @if ($errors->any())
                  @include('admin.partials.errors')
                @endif
                <!-- /.errors -->

                <!--Card content-->
                <div class="card-body">
                    {!! Form::open(['route' => 'questions.store', 'files' => true, 'id' =>'formId']) !!}

                        @include('admin.questions.partials.form')

                    {!! Form::close() !!}
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>

@endsection

@section('scripts')
  <script src="{{ asset('vendor/validate/jquery.validate.min.js') }}"></script>

  <script>
  $(document).ready(function() {
    // $.validator.addMethod("valueNotPatient", function(value, element, arg) {
    //   return arg != value;
    // }, 'Por favor, seleccione al Paciente');

    // $.validator.addMethod("valueNotTurn", function(value, element, arg) {
    //   return arg != value;
    // }, 'Por favor, seleccione el Turno');

    // $.validator.addMethod("valueNotService", function(value, element, arg) {
    //   return arg != value;
    // }, 'Por favor, seleccione el Servicio');

    $("#formId" ).validate({
      rules: {
        name: {
          required: true
        },
        slug: {
          required: true
        },
        order: {
          required: true
        },
        image: {
          required: true
        },
        filename: {
          required: true
        },
      }
      // messages: {
      //   number: 'Por favor, ingrese el número',
      //   day_number: 'Por favor, ingrese el número del día',
      // }
    });
  });
  </script>
@endsection