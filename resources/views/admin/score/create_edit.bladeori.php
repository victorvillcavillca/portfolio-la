@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('admin/camporiclub.camporiclubs')
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
        <h3 class="box-title">
        <h1>Bienvenido a las puntuaciones de clubes</h1>
        @if (isset($camporiclub))
          {{ trans('admin/camporiclub.edit_camporiclub') }}
          @else
          {{ trans('admin/camporiclub.create_camporiclub') }}
        @endif
        </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      
        <div class="box-body">
          @foreach($requirementareas as $requirementarea)
          <h4><b>{{ $requirementarea->name }}</b></h4>
          @if (isset($score))
          {!! Form::model($score, array('url' => URL::to('admin/scores') . '/' . $score->id, 'id' => 'formId','method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
          @else
          {!! Form::open(array('url' => URL::to('admin/scores'), 'id' => 'formId', 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
          @endif
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>DETALLE</th>
                  <th>PUNTAJE</th>
                  <th>PREMIO</th>
                  <th>OBSERVACIÓN</th>
                </tr>
              </thead>
              <tbody>
                <!--<form method="get" action="{{ URL::to('admin/supplyproducts/create') }}">-->
                <?php $requirements = $requirementarea->requirements; ?>
                @foreach($requirements as $requirement)
                <tr>
                  <td>{{ $requirement->detail }}</td>
                  <td>{{ $requirement->score }}</td>
                  <td>
                    <input type="hidden" name="requirement_id" value="{{ $requirement->id }}">
                    <input type="number" class="form-control" name="{{ $requirement->id }}" required>
                  </td>
                </tr>
                @endforeach

                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i> {!! trans('modal.aggregate') !!}</button>
                  <!--</form>-->
              </tbody>
            </table>
                
          </div>
          <!-- Form Actions -->
            <div class="box-footer">
              <a class="btn btn-warning" href="{{ URL::to('admin/scores') }}"><i class="fa fa-list"></i> {{trans('modal.cancel')}}</a>
              <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save" aria-hidden="true"></i> 
                  @if (isset($camporiclubarea)) 
                      {{ trans('modal.edit') }}
                  @else 
                      {{ trans('modal.save') }}
                  @endif
              </button>
            </div>
            <!-- ./ form actions -->
          {!! Form::close() !!}
          @endforeach
        </div>

        
    </div>
  </div>
</div>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_scores").addClass('active');
        $("#submenu_camporiclub").addClass('active');

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