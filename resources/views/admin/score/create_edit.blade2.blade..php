@extends('layouts.admin')

@section('content')
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
        <h1 class="box-title">
        VIII CAMPORI DE CONQUISTADORES MOB “En tus pasos seré vencedor”
        </h1>
        <h3>Puntuaciones Club: <b>{{ $score->name }}</b></h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
     
        <div class="box-body">
          @foreach($requirementareas as $requirementarea)
  
          <button type="button" style="width: 100%" class="btn btn-primary" data-toggle="collapse" data-target="#demo{{ $requirementarea->id }}"><b>{{  $requirementarea->name }}</b></button>
          <div id="demo{{ $requirementarea->id }}" class="collapse">
            <h4><b>{{ $requirementarea->name }}</b></h4>
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
                    @foreach($requirements as $requirement)
                    <input type="hidden" name="requirement_id[]" value="{{ $requirement->id }}">
                    <tr>
                      <td>{{ $requirement->detail }}</td>
                      <td>{{ $requirement->score }}</td>
                      @if (count($requirements_club) == 0)
                        <td>
                          <input type="number" name="scores[]" class="form-control" required>
                        </td>
                        <td>
                          <input type="text" name="observations[]" class="form-control">
                        </td>
                      @else 
                        @foreach($requirements_club as $requirement_club)
                          <?php  if (($requirement_club->id == $requirement->id) && ($requirementarea->id == $requirement_club->requirementarea->id)) {?>
                            <td>
                              <input type="number" name="scores[]" class="form-control" value="{{ $requirement_club->pivot->score_reached }}" required>
                            </td>
                            <td>
                              <input type="text" name="observations[]" class="form-control" value="{{ $requirement_club->pivot->observations }}">
                            </td>
                          <?php } else { ?>
                                    
                          <?php } ?>
                        @endforeach
                      @endif
                    </tr>
                    @endforeach
                    <tr>
                      <td><b>TOTAL DEL ÁREA</b></td>
                      <td><b>{{ $requirementarea->total_score }}</b>                    
                      <td><b>{{ $requirementarea->total_score }}</b>                    
                      </td>
                    </tr>
                  </tbody>
                </table>
                <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> {!! trans('modal.save') !!}</button>
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

        /*$.validator.addMethod("valueNotcamporiclubArea", function(value, element, arg) {
          return arg != value;
        },*/ /*'Por favor, seleccione la Área');*/


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