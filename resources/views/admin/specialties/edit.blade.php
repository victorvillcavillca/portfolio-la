@extends('layouts.admin-dash')

@section('content')
<div class="container-fluid mt-5">

    <!-- Alerts -->
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.specialties.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Editar Espcialidad
                </div>

                <!-- errors -->
                @if ($errors->any())
                  @include('admin.partials.errors')
                @endif
                <!-- /.errors -->

                <!--Card content-->
                <div class="card-body">
                    {!! Form::model($specialty, ['route' => ['specialties.update', $specialty->id], 'method' => 'PUT', 'files' => true, 'id' => 'formId']) !!}

                        @include('admin.specialties.partials.form')

                    {!! Form::close() !!}
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
