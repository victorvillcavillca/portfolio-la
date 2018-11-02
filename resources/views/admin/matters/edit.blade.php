@extends('layouts.tim-admin')

@section('content')
<div class="container-fluid mt-5">

    <!-- Alerts -->
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.matters.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Editar Materia
                </div>

                <!-- errors -->
                @if ($errors->any())
                  @include('admin.partials.errors')
                @endif
                <!-- /.errors -->

                <!--Card content-->
                <div class="card-body">
                    {!! Form::model($matter, ['route' => ['matters.update', $matter->id], 'method' => 'PUT']) !!}

                        @include('admin.matters.partials.form')

                    {!! Form::close() !!}
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
</div>
@endsection
