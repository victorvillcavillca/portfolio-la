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
                    Editar Area Especialidad
                </div>

                <!-- errors -->
                @if ($errors->any())
                  @include('admin.partials.errors')
                @endif
                <!-- /.errors -->

                <!--Card content-->
                <div class="card-body">
                    {!! Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'PUT']) !!}

                        @include('admin.evaluations.partials.form')

                    {!! Form::close() !!}
                </div>
                <div class="card-footer">
                    <a href="{{ route('evaluations.create') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
