@extends('layouts.admin')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('admin/club.clubs')
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i>@lang('site/menu.home')</a></li>
    <li>@lang('admin/club.clubs')</li>
    <li class="active">@lang('admin/club.clubs')</li>
  </ol>
</section>

<div class="row">
  <!-- left column -->
  <div class="col-md-8 col-md-offset-2">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
        @if (isset($club))
          {{ trans('admin/club.edit_club') }}
          @else
          {{ trans('admin/club.create_club') }}
        @endif
        </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      @if (isset($club))
      {!! Form::model($club, array('url' => URL::to('admin/clubs') . '/' . $club->id, 'id' => 'formId', 'method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
      @else
      {!! Form::open(array('url' => URL::to('admin/clubs'), 'id' => 'formId', 'method' => 'post', 'class' => 'bf', 'files'=> true)) !!}
      @endif
        <div class="box-body">
          <div class="form-group  {{ $errors->has('name') ? 'has-error' : '' }}">
              {!! Form::label('name', trans("admin/club.name"), array('class' => 'control-label')) !!}
              {!! Form::text('name', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('name', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('bibleText') ? 'has-error' : '' }}">
              {!! Form::label('bibleText', trans("admin/club.bibleText"), array('class' => 'control-label')) !!}
              {!! Form::text('bibleText', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('bibleText', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('motto') ? 'has-error' : '' }}">
              {!! Form::label('motto', trans("admin/club.motto"), array('class' => 'control-label')) !!}
              {!! Form::text('motto', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('motto', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('battleCry') ? 'has-error' : '' }}">
              {!! Form::label('battleCry', trans("admin/club.battleCry"), array('class' => 'control-label')) !!}
              {!! Form::text('battleCry', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('battleCry', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('address') ? 'has-error' : '' }}">
              {!! Form::label('address', trans("admin/club.address"), array('class' => 'control-label')) !!}
              {!! Form::text('address', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('address', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('neighborhood') ? 'has-error' : '' }}">
              {!! Form::label('neighborhood', trans("admin/club.neighborhood"), array('class' => 'control-label')) !!}
              {!! Form::text('neighborhood', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('neighborhood', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('mainMeeting') ? 'has-error' : '' }}">
              {!! Form::label('mainMeeting', trans("admin/club.mainMeeting"), array('class' => 'control-label')) !!}
              {!! Form::text('mainMeeting', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('mainMeeting', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('horary') ? 'has-error' : '' }}">
              {!! Form::label('horary', trans("admin/club.horary"), array('class' => 'control-label')) !!}
              {!! Form::text('horary', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('horary', ':message') }}</span>
          </div>

          <!-- Date dd/mm/yyyy -->
          <div class="form-group  {{ $errors->has('foundationDate') ? 'has-error' : '' }}">
              {!! Form::label('foundationDate', trans("admin/club.foundationDate"), array('class' => 'control-label')) !!}
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                {!! Form::text('foundationDate', null, array('class' => 'form-control')) !!}
              </div>
              <span class="help-block">{{ $errors->first('foundationDate', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('church_id') ? 'has-error' : '' }}">
              {!! Form::label('church_id', trans('admin/church.church'), array('class' => 'control-label')) !!}
              {!! Form::select('church_id', $churches, isset($club)? $club->church_id : 0, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('church_id', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('province_id') ? 'has-error' : '' }}">
              {!! Form::label('province_id', trans('admin/province.province'), array('class' => 'control-label')) !!}
              {!! Form::select('province_id', $provinces, isset($club)? $club->province_id : 0, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('province_id', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('latitude') ? 'has-error' : '' }}">
              {!! Form::label('latitude', trans("admin/club.latitude"), array('class' => 'control-label')) !!}
              {!! Form::text('latitude', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('latitude', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('longitude') ? 'has-error' : '' }}">
              {!! Form::label('longitude', trans("admin/club.longitude"), array('class' => 'control-label')) !!}
              {!! Form::text('longitude', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('longitude', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('description') ? 'has-error' : '' }}">
              {!! Form::label('description', trans("admin/club.description"), array('class' => 'control-label')) !!}
              {!! Form::textArea('description', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('description', ':message') }}</span>
          </div>

          <div class="form-group  {{ $errors->has('history') ? 'has-error' : '' }}">
              {!! Form::label('history', trans("admin/club.history"), array('class' => 'control-label')) !!}
              {!! Form::textArea('history', null, array('class' => 'form-control')) !!}
              <span class="help-block">{{ $errors->first('history', ':message') }}</span>
          </div>

          @if (isset($club) && $club->logoname != '')
          <div class="form-group">
            <img src="/images/uploads/clubs/{{ $club->logoname }}" alt="club" height="200" width="200">
            </div>
          @else
                
          @endif
          <div class="form-group  {{ $errors->has('logoname') ? 'has-error' : '' }}">
              {!! Form::label('source', trans("admin/club.logo"), array('class' => 'control-label')) !!}
              {!! Form::file('logoname') !!}
              <span class="help-block">{{ $errors->first('logoname', ':message') }}</span>
          </div>

          @if (isset($club) && $club->picturename != '')
          <div class="form-group">
            <img src="/images/uploads/clubs/{{ $club->picturename }}" alt="club" height="200" width="300">
            </div>
          @else
                
          @endif
          <div class="form-group  {{ $errors->has('picturename') ? 'has-error' : '' }}">
              {!! Form::label('source', trans("admin/club.file"), array('class' => 'control-label')) !!}
              {!! Form::file('picturename') !!}
              <span class="help-block">{{ $errors->first('picturename', ':message') }}</span>
          </div>

         <!-- Form Actions -->
          <a class="btn btn-warning" href="{{ URL::to('admin/clubs') }}" role="button">{{trans('modal.cancel')}}</a>
          <button type="submit" class="btn btn-success">
              @if (isset($club)) 
                  {{ trans('modal.edit') }}
              @else 
                  {{ trans('modal.create') }}
              @endif
          </button>
          <!-- ./ form actions -->
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>

<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/bootbox.min.js') }}"></script>
<link href="{{ asset('css/css/screen.css') }}" rel="stylesheet">

<!-- Page script -->
<script type="text/javascript">
    $(document).ready(function(){
      $("#menu_generalSecretary").addClass('active');
      $("#submenu_club").addClass('active');
    $.validator.addMethod("valueNotChurch", function(value, element, arg) {
      return arg != value;
    }, 'Por favor, seleccione la Iglesia');

    $.validator.addMethod('valueNotProvince', function (value, element, arg) {
      return arg != value;
    }, 'Por favor, seleccione la Provincia');

    $("#formId").validate({
      rules: {
        name: {
          required: true
        },
        church_id: {
          valueNotChurch: '0'
        },
        province_id: {
          valueNotProvince: '0'
        }
      },
      messages: {
        name: 'Por favor, escriba su Nombre',
      }
    });

    //Datemask dd/mm/yyyy
    $("#foundationDate").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    // instance, using default configuration.
    //CKEDITOR.replace('summary');
    //bootstrap WYSIHTML5 - text editor
    //$(".textarea").wysihtml5();
    tinymce.init({
      selector: 'textarea#summary',
      height: 100,
      menubar: false,
      content_css: '//www.tinymce.com/css/codepen.min.css'
    });

    tinymce.init({
      selector: 'textarea#history',
      height: 400,
      menubar: true,
      plugins: [
        'advlist autolink lists link image charmap print preview anchor',
        'searchreplace visualblocks code fullscreen',
        'insertdatetime media table contextmenu paste code'
      ],
      toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
      content_css: '//www.tinymce.com/css/codepen.min.css'
    });

  });
</script>
@endsection