@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('admin/requirementarea.requirementareas')
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i>@lang('site/menu.home')</a></li>
    <li>@lang('site/menu.admin')</li>
    <li class="active">@lang('admin/requirementarea.requirementareas')</li>
  </ol>
</section>

<div class="row">
  <!-- left column -->
  <div class="col-md-8 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
        @if (isset($requirementarea))
          {{ trans('admin/requirementarea.edit_requirementarea') }}
          @else
          {{ trans('admin/requirementarea.create_requirementarea') }}
        @endif
        </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @if (isset($requirementarea))
      {!! Form::model($requirementarea, array('url' => URL::to('admin/requirementareas') . '/' . $requirementarea->id, 'method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
      @else
      {!! Form::open(array('url' => URL::to('admin/requirementareas'), 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
      @endif
        <div class="box-body">
          <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
              {!! Form::label('name', trans("admin/requirementarea.name"), array('class' => 'control-label')) !!}
              {!! Form::text('name', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('name', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('total_score') ? 'has-error' : '' }}">
              {!! Form::label('total_score', trans("admin/requirementarea.total_score"), array('class' => 'control-label')) !!}
              {!! Form::text('total_score', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('total_score', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
              {!! Form::label('description', trans("admin/requirementarea.description"), array('class' => 'control-label')) !!}
              {!! Form::textArea('description', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('description', ':message') }}</span>
          </div>
        </div>
        <!-- Form Actions -->
        <div class="box-footer">
          <a class="btn btn-warning" href="{{ URL::to('admin/requirementareas') }}"><i class="fa fa-list"></i> {{trans('modal.cancel')}}</a>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_scores").addClass('active');
        $("#submenu_requirementarea").addClass('active');
    });
</script>
@endsection