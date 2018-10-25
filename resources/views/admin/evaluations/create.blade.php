@extends('layouts.dashboard')

@section('content')

<div class="container-fluid mt-5">

    <!-- Alerts -->
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.evaluations.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">

                <div class="card-header">
                    Crear Especialidad
                </div>

                <!-- errors -->
                @if ($errors->any())
                  @include('admin.partials.errors')
                @endif
                <!-- /.errors -->

                <!--Card content-->
                <div class="card-body">
                    {!! Form::open(['route' => 'evaluations.store', 'files' => true, 'id' =>'formId']) !!}

                        @include('admin.evaluations.partials.form')

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
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/validate/jquery.validate.min.js') }}"></script>
{{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script> --}}
<script>
  $(document).ready(function(){
      $("#name, #slug").stringToSlug({
          callback: function(text){
              $('#slug').val(text);
          }
      });

      $("#formId" ).validate({
        errorClass: 'text-danger',
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
          // image: {
          //   required: true
          // },
          // filename: {
          //   required: true
          // },
        }
        // messages: {
        //   number: 'Por favor, ingrese el número',
        //   day_number: 'Por favor, ingrese el número del día',
        // }
      });
  });
</script>
@endsection