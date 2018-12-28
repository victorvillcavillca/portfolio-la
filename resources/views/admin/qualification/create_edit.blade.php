@extends('layouts.admin-dash')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('admin/qualification.qualifications')
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i>@lang('site/menu.home')</a></li>
    <li>@lang('admin/qualification.qualifications')</li>
    <li class="active">@lang('admin/qualification.qualifications')</li>
  </ol>
</section>

<div class="row">
  <!-- left column -->
  <div class="col-md-8 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
        @if (isset($qualification))
          {{ trans('admin/qualification.edit_qualification') }}
          @else
          {{ trans('admin/qualification.create_qualification') }}
        @endif
        </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @if (isset($qualification))
      {!! Form::model($qualification, array('url' => URL::to('admin/qualifications') . '/' . $qualification->id, 'id' => 'formId','method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
      @else
      {!! Form::open(array('url' => URL::to('admin/qualifications'), 'id' => 'formId', 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
      @endif
        <div class="box-body">
          <div class="form-group  {{ $errors->has('category') ? 'has-error' : '' }}">
              {!! Form::label('category', trans("admin/qualification.category"), array('class' => 'control-label')) !!}
              {!! Form::text('category', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('category', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('maximum_score') ? 'has-error' : '' }}">
              {!! Form::label('maximum_score', trans("admin/qualification.maximum_score"), array('class' => 'control-label')) !!}
              {!! Form::number('maximum_score', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('maximum_score', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('initial_percentage') ? 'has-error' : '' }}">
              {!! Form::label('initial_percentage', trans("admin/qualification.initial_percentage"), array('class' => 'control-label')) !!}
              {!! Form::text('initial_percentage', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('initial_percentage', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('final_percentage') ? 'has-error' : '' }}">
              {!! Form::label('final_percentage', trans("admin/qualification.final_percentage"), array('class' => 'control-label')) !!}
              {!! Form::text('final_percentage', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('final_percentage', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('initial_score') ? 'has-error' : '' }}">
              {!! Form::label('initial_score', trans("admin/qualification.initial_score"), array('class' => 'control-label')) !!}
              {!! Form::number('initial_score', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('initial_score', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('final_score') ? 'has-error' : '' }}">
              {!! Form::label('final_score', trans("admin/qualification.final_score"), array('class' => 'control-label')) !!}
              {!! Form::number('final_score', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('final_score', ':message') }}</span>
          </div>

        </div>

        <!-- Form Actions -->
        <div class="box-footer">
          <a class="btn btn-warning" href="{{ URL::to('admin/qualifications') }}"><i class="fa fa-list"></i> {{trans('modal.cancel')}}</a>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save" aria-hidden="true"></i>
              @if (isset($qualificationarea))
                  {{ trans('modal.edit') }}
              @else
                  {{ trans('modal.save') }}
              @endif
          </button>
        </div>
        <!-- ./ form actions -->
      {!! Form::close() !!}
    </div>
  </div>
</div>

<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_scores").addClass('active');
        $("#submenu_qualification").addClass('active');

        /*$.validator.addMethod("valueNotqualificationArea", function(value, element, arg) {
          return arg != value;
        },*/ /*'Por favor, seleccione la Área');*/


        $("#formId").validate({
          rules: {
            category: {
              required: true
            },
            maximum_score: {
              required: true, number: true
            },
            initial_percentage: {
              required: true, number: true
            },
            final_percentage: {
              required: true, number: true
            },
            /*qualificationarea_id: {
              valueNotqualificationArea: '0'
            },*/
          },
          messages: {
            category: 'Por favor, escriba el Categoría',
            maximum_score: 'Por favor, escriba la Puntuación máxima',
            initial_percentage: 'Por favor, escriba el Porcentaje inicial',
            final_percentage: 'Por favor, escriba el Porcentaje final',
          }
        });
    });
</script>
@endsection