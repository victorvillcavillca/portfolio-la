{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('resource_category_id', 'Recursos Categorías', ['class' => 'font-weight-bold']) }}
	{{ Form::select('resource_category_id', $resource_categories, null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('name', 'Nombre', ['class' => 'font-weight-bold']) }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'URL amigable', ['class' => 'font-weight-bold']) }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('order', 'Orden', ['class' => 'font-weight-bold']) }}
    {{ Form::number('order', null, ['class' => 'form-control', 'id' => 'order']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripción', ['class' => 'font-weight-bold']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) }}
</div>
<div class="form-group">
    {{ Form::label('image', 'Imagen', ['class' => 'font-weight-bold']) }}
    {{ Form::file('image') }}
</div>
<div class="form-group">
	{{ Form::label('slug', 'Estado', ['class' => 'font-weight-bold']) }}
	<label>
		{{ Form::radio('status', 'PUBLISHED') }} Publicado
	</label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Borrador
	</label>
</div>

<div class="form-group">
    {{ Form::label('filename', 'Documento', ['class' => 'font-weight-bold']) }}
    {{ Form::file('filename') }}
</div>
{{-- <div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div> --}}
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
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