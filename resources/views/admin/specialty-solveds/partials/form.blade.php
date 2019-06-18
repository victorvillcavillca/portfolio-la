{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('specialty_area_id', 'Áreas de Especialidades', ['class' => 'font-weight-bold']) }}
	{{ Form::select('specialty_area_id', $specialty_areas, NULL, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Nombre', ['class' => 'font-weight-bold']) }}
    @if ($errors->has('name'))
    {{ Form::text('name', NULL, ['class' => "form-control is-invalid",'id' => 'name']) }}
    @else
    {{ Form::text('name', NULL, ['class' => "form-control",'id' => 'name']) }}
    @endif

    @if ($errors->has('name'))
    <span class="invalid-feedback">
        {{ $errors->first('name') }}
    </span>
    @endif
</div>

<div class="form-group">
    {{ Form::label('slug', 'URL amigable', ['class' => 'font-weight-bold']) }}
    {{ Form::text('slug', NULL, ['class' => 'form-control-plaintext', 'id' => 'slug', 'readonly']) }}
</div>
<div class="form-group">
    {{ Form::label('order', 'Orden', ['class' => 'font-weight-bold']) }}
    {{ Form::text('order', isset($order)? $order: NULL, ['class' => 'form-control-plaintext', 'id' => 'order', 'readonly']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripción', ['class' => 'font-weight-bold']) }}
    {{ Form::textarea('description', NULL, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen', ['class' => 'font-weight-bold']) }}
    {{ Form::file('image') }}
</div>

<div class="form-group">
	{{ Form::label('status', 'Estado', ['class' => 'font-weight-bold']) }}
	<label>
		{{ Form::radio('status', 'PUBLISHED') }} Publicado
	</label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Borrador
	</label>

	@if ($errors->has('status'))
    <div class="help-blok text-danger" style="font-size: 80%;">
    	{{ $errors->first('status') }}
  	</div>
	@endif
</div>

<div class="form-group">
    {{ Form::label('filename', 'Documento', ['class' => 'font-weight-bold']) }}
    {{ Form::file('filename') }}
{{-- doc,pdf,docx,zip --}}
    <div class="help-blok text-danger" style="font-size: 80%;"><strong>Sólo se aceptarán formatos doc, docx, xls, xlsx, pdf, ppt, pptx, jpg, jpeg e zip</strong> (Seleccione un archivo de hasta 2 MB ..)
    </div>

    @if ($errors->has('filename'))
    <div class="help-blok text-danger" style="font-size: 80%;">
    	{{ $errors->first('filename') }}
  	</div>
	@endif
</div>
<hr>
<div class="form-group">
    <a href="{{ route('specialty-solveds.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-times"></i> @lang('button.cancel')</a>

    <button type="submit"  class="pull-right btn btn-sm btn-primary"><i class="fa fa-save"></i> @lang('button.save')</button>
</div>

@section('scripts')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/validate/jquery.validate.min.js') }}"></script>
{{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script> --}}
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });

	    $("#formId" ).validate({
	      errorClass: 'text-danger',
	      rules: {
	        name: {
	          required: true
	        },
	        slug: {
	          required: true
	        },
	        order: {
	          required: true
	        },
	        // image: {
	        //   required: true
	        // },
	        // filename: {
	        //   required: true
	        // },
	      }
	      // messages: {
	      //   number: 'Por favor, ingrese el número',
	      //   day_number: 'Por favor, ingrese el número del día',
	      // }
    	});

	 //    CKEDITOR.config.height = 400;
		// CKEDITOR.config.width  = 'auto';

		// CKEDITOR.replace('body');
	});
</script>
@endsection