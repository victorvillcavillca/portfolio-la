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
        @if (isset($camporiclub))
          {{ trans('admin/camporiclub.edit_camporiclub') }}
          @else
          {{ trans('admin/camporiclub.create_camporiclub') }}
        @endif
        </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @if (isset($camporiclub))
      {!! Form::model($camporiclub, array('url' => URL::to('admin/camporiclubs') . '/' . $camporiclub->id, 'id' => 'formId','method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
      @else
      {!! Form::open(array('url' => URL::to('admin/camporiclubs'), 'id' => 'formId', 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
      @endif
        <div class="box-body">
          <div class="form-group  {{ $errors->has('code') ? 'has-error' : '' }}">
              {!! Form::label('code', trans("admin/camporiclub.code"), array('class' => 'control-label')) !!}
              {!! Form::number('code', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('code', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
              {!! Form::label('name', trans("admin/camporiclub.name"), array('class' => 'control-label')) !!}
              {!! Form::text('name', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('name', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('church') ? 'has-error' : '' }}">
              {!! Form::label('church', trans("admin/camporiclub.church"), array('class' => 'control-label')) !!}
              {!! Form::text('church', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('church', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('district') ? 'has-error' : '' }}">
              {!! Form::label('district', trans("admin/camporiclub.district"), array('class' => 'control-label')) !!}
              {!! Form::text('district', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('district', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('region') ? 'has-error' : '' }}">
              {!! Form::label('region', trans("admin/camporiclub.region"), array('class' => 'control-label')) !!}
              {!! Form::text('region', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('region', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('total_score') ? 'has-error' : '' }}">
              {!! Form::label('total_score', trans("admin/camporiclub.total_score"), array('class' => 'control-label')) !!}
              {!! Form::number('total_score', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('total_score', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('payment') ? 'has-error' : '' }}">
              {!! Form::label('payment', trans("admin/camporiclub.payment"), array('class' => 'control-label')) !!}
              {!! Form::number('payment', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('payment', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('inscribed') ? 'has-error' : '' }}">
              {!! Form::label('inscribed', trans("admin/camporiclub.inscribed"), array('class' => 'control-label')) !!}
              {!! Form::number('inscribed', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('inscribed', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('support') ? 'has-error' : '' }}">
              {!! Form::label('support', trans("admin/camporiclub.support"), array('class' => 'control-label')) !!}
              {!! Form::number('support', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('support', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
              {!! Form::label('description', trans("admin/camporiclub.description"), array('class' => 'control-label')) !!}
              {!! Form::textArea('description', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('description', ':message') }}</span>
          </div>

        </div>

        <!-- Form Actions -->
        <div class="box-footer">
          <a class="btn btn-warning" href="{{ URL::to('admin/camporiclubs') }}"><i class="fa fa-list"></i> {{trans('modal.cancel')}}</a>
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