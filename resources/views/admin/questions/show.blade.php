@extends('layouts.admin-dash')

@section('content')

<div class="container-fluid mt-5">
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
                    Ver Pregunta
                </div>
                <!--Card content-->
                <div class="card-body">
                    <p><strong>Pregunta</strong> {{ $question->question }}</p>
                    <p><strong>Opción 1</strong> {{ $question->option_1 }}</p>
                    <p><strong>Opción 2</strong> {{ $question->option_2 }}</p>
                    <p><strong>Opción 3</strong> {{ $question->option_3 }}</p>
                    <p><strong>Opción 4</strong> {{ $question->option_4 }}</p>
                    <p><strong>Respuesta</strong> {{ $question->answer }}</p>
                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->
    </div>

</div>

@endsection
