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
                            <div class="card-header red lighten-1 white-text text-uppercase font-weight-bold text-center py-2">Seleccione el inciso correcto de las siguientes preguntas</div>


                            <div class="card-body">
                                {{-- {{ Form::open(['route' => 'evaluations.store', 'files' => true, 'id' =>'formId']) }}

                                {{ Form::close() }} --}}

                                <strong>Evaluación:</strong>
                                <hr>
                                <p>Tiene un máximo de 2 minutos por pregunta.</p>
                                <hr>

                                {{ Form::open(['route' => 'evaluation.store']) }}
                                {{ Form::hidden('user_id', auth()->user()->id) }}


                                @foreach($questions as $question)
                                    {{-- {{ Form::hidden('question_id', $question->id) }} --}}
                                    <p><strong>{{ $question->question }}</strong></p>

                                    <label><strong>a)</strong> {{ Form::radio('answer', $question->option_1) }} {{ $question->option_1 }}</label><br>

                                    <label><strong>b)</strong> {{ Form::radio('answer', $question->option_2) }} {{ $question->option_2 }}</label><br>

                                    <label><strong>c)</strong> {{ Form::radio('answer', $question->option_3) }} {{ $question->option_3 }}</label><br>

                                    <label><strong>d)</strong> {{ Form::radio('answer', $question->option_4) }} {{ $question->option_4 }}</label><br>

                                @endforeach

                                    <button type="submit"  class="btn btn-sm btn-primary"><i class="fa fa-save"></i> @lang('button.save')</button>
                                {{ Form::close() }}
                            </div>

                            <div class="card-footer">
                                {{-- <a href="{{ route('evaluations') }}" class="btn btn-primary btn-sm">Guardar</a> --}}
                                <button type="submit"  class="btn btn-sm btn-primary"><i class="fa fa-save"></i> @lang('button.save')</button>
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