@extends('layouts.admin-dash')

@section('content')
<?php use Illuminate\Support\Facades\DB; ?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('admin/camporiclub.camporiclub') <b>{{ $score->name }}</b>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i>@lang('site/menu.home')</a></li>
    <li>@lang('admin/camporiclub.camporiclubs')</li>
    <li class="active">@lang('admin/camporiclub.camporiclubs')</li>
  </ol>
</section>

<div class="row">
  <!-- left column -->
  <div class="col-md-8 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 style="text-align: center;"><b>Campori Regional Cuarta Región A “Fe y Acción”</b></h3>
        <h3>Puntuaciones Club: <b>{{ $score->name }}</b></h3>
        <h4>TOTAL PUNTOS LOGRAR: <b>{{ $qualification->maximum_score }}</b></h4>
        <h3 style="font-style: oblique;">PUNTOS ALCANZADOS: <b>{{ $total_score_reached }}</b></h3>
        <h3 style="text-transform: uppercase;"><b>{{ $category }}</b></h3>
          @if (Session::has('status'))
            <div class="callout callout-success">
              <p>{{ Session::get('status') }}</p>
            </div>
          @endif

          @if (Session::has('error'))
            <div class="callout callout-danger">
              <p>{{ Session::get('error') }}</p>
            </div>
          @endif

          <div class="btn-group pull-right">
              <a href="{{ URL::to('admin/pdf/'. $score->id .'/bathreceipt') }}" class="btn btn-success" target="_blank"><i class='glyphicon glyphicon-print'></i> Imprimir</a>
          </div>
      </div>
      <!-- /.box-header -->
      <!-- form start -->

        <div class="box-body">
          @foreach($requirementareas as $requirementarea)
          <?php   $total_score_reached = DB::table('detail_score')
                ->where('campori_club_id', '=', $score->id)
                ->where('requirement_area_id', '=', $requirementarea->id)
                ->sum('score_reached');?>
          <button type="button" style="width: 100%" class="btn btn-primary" data-toggle="collapse" data-target="#demo{{ $requirementarea->id }}"><b>{{ $requirementarea->total_score }} - {{  $requirementarea->name }}</b> - ({{$total_score_reached}})</button>
          <div id="demo{{ $requirementarea->id }}" class="collapse">
            <h4 style="text-align: center;"><b>{{ $requirementarea->name }}</b></h4>
            <h5><b>TOTAL DEL ÁREA: {{ $requirementarea->total_score }}</b></h5>
            <h5><b>TOTAL PUNTOS ALCANZADOS:</b> {{ $total_score_reached }}</h5>
            <div class="table-responsive">
              <form method="get" action="{{ URL::to('admin/scores/save') }}">
              <input type="hidden" name="campori_club_id" value="{{ $score->id }}">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>DETALLE</th>
                      <th>PUNTAJE</th>
                      <th>PREMIO (Puntaje alcanzado)</th>
                      <th>OBSERVACIÓN</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $requirements = $requirementarea->requirements; ?>
                    <?php $total_score_reached_area = 0; ?>
                    @foreach($requirements as $requirement)
                    <input type="hidden" name="requirement_id[]" value="{{ $requirement->id }}">
                    <tr>
                      <td>{{ $requirement->detail }}</td>
                      <td>{{ $requirement->score }}</td>
                      <?php $sw = true; ?>
                      @foreach($requirements_club as $requirement_club)
                        <?php if (($requirement_club->id == $requirement->id) && ($requirementarea->id == $requirement_club->requirementarea->id)) {?>
                          <td>
                            <input type="number" name="scores[]" class="form-control" value="{{ $requirement_club->pivot->score_reached }}" required>
                          </td>
                          <td>
                            <input type="text" name="observations[]" class="form-control" value="{{ $requirement_club->pivot->observations }}">
                          </td>
                        <?php
                          $sw = false;
                           $total_score_reached_area = $total_score_reached_area + $requirement_club->pivot->score_reached;
                        }?>
                      @endforeach

                      <?php
                        if ($sw) {?>
                          <td>
                            <input type="number" name="scores[]" class="form-control" required>
                          </td>
                          <td>
                            <input type="text" name="observations[]" class="form-control">
                          </td>
                      <?php } ?>
                      <?php
                      ?>
                    </tr>
                    @endforeach
                    <tr>
                      <td><b>TOTAL DEL ÁREA</b></td>
                      <td><b>{{ $requirementarea->total_score }}</b>
                      <td style="text-align: center;">{{ $total_score_reached_area }}</td>
                    </tr>
                  </tbody>
                </table>

                <div class="box-footer"></button>
                  <button type="submit" formaction="{{ URL::to('admin/scores/saveclose') }}" class="btn btn-success"><i class="fa fa-save"></i> {!! trans('modal.save_and_close') !!}</button>
                  <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> {!! trans('modal.save') !!}</button>
                </div>

              </form>
            </div>
          </div>
          <hr>
          @endforeach
        </div>

        <!-- Form Actions -->
        <div class="box-footer">
          <a class="btn btn-warning" href="{{ URL::to('admin/scores') }}"><i class="fa fa-list"></i> {{trans('modal.cancel')}}</a>
        </div>
        <!-- ./ form actions -->

    </div>
  </div>
</div>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_scores").addClass('active');
        $("#submenu_scores").addClass('active');
        $("#formId").validate({
          rules: {
            code: {
              required: true
            },
            name: {
              required: true
            },
            total_score: {
              required: true, number: true
            },
            /*camporiclubarea_id: {
              valueNotcamporiclubArea: '0'
            },*/
          },
          messages: {
            code: 'Por favor, escriba el Código',
            name: 'Por favor, escriba el Nombre',
            total_score: 'Por favor, escriba el Puntaje total',
          }
        });
    });
</script>
@endsection