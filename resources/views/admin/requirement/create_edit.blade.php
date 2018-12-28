@extends('layouts.admin-dash')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('admin/requirement.requirements')
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i>@lang('site/menu.home')</a></li>
    <li>@lang('admin/requirement.requirements')</li>
    <li class="active">@lang('admin/requirement.requirements')</li>
  </ol>
</section>

<div class="row">
  <!-- left column -->
  <div class="col-md-8 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
        @if (isset($requirement))
          {{ trans('admin/requirement.edit_requirement') }}
          @else
          {{ trans('admin/requirement.create_requirement') }}
        @endif
        </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @if (isset($requirement))
      {!! Form::model($requirement, array('url' => URL::to('admin/requirements') . '/' . $requirement->id, 'id' => 'formId','method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
      @else
      {!! Form::open(array('url' => URL::to('admin/requirements'), 'id' => 'formId', 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
      @endif
        <div class="box-body">
          <div class="form-group  {{ $errors->has('detail') ? 'has-error' : '' }}">
              {!! Form::label('detail', trans("admin/requirement.detail"), array('class' => 'control-label')) !!}
              {!! Form::text('detail', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('detail', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('score') ? 'has-error' : '' }}">
              {!! Form::label('score', trans("admin/requirement.score"), array('class' => 'control-label')) !!}
              {!! Form::number('score', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('score', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
              {!! Form::label('description', trans("admin/requirement.description"), array('class' => 'control-label')) !!}
              {!! Form::textArea('description', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('description', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('requirementarea_id') ? 'has-error' : '' }}">
              {!! Form::label('requirementarea_id', trans('admin/requirementarea.requirementarea'), array('class' => 'control-label')) !!}
              {!! Form::select('requirementarea_id', $requirementareas, isset($requirement)? $requirement->requirementarea_id : 0, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('requirementarea_id', ':message') }}</span>
          </div>
        </div>

        <!-- Form Actions -->
        <div class="box-footer">
          <a class="btn btn-warning" href="{{ URL::to('admin/requirements') }}"><i class="fa fa-list"></i> {{trans('modal.cancel')}}</a>
          <button type="submit" class="btn btn-success pull-right"><i class="fa fa-save" aria-hidden="true"></i>
              @if (isset($requirementarea))
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
        $("#submenu_requirement").addClass('active');

        $.validator.addMethod("valueNotRequirementArea", function(value, element, arg) {
          return arg != value;
        }, 'Por favor, seleccione la Área');


        $("#formId").validate({
          rules: {
            detail: {
              required: true
            },
            score: {
              required: true, number: true
            },
            requirementarea_id: {
              valueNotRequirementArea: '0'
            },
          },
          messages: {
            detail: 'Por favor, escriba el Detalle',
            score: 'Por favor, escriba el Puntaje',
          }
        });
    });
</script>
@endsection