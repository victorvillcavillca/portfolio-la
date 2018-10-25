{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('evaluation_id', 'Categoría', ['class' => 'font-weight-bold']) }}
	{{ Form::select('evaluation_id', $evaluations, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('question', 'Pregunta', ['class' => 'font-weight-bold']) }}
    {{ Form::text('question', null, ['class' => 'form-control', 'id' => 'question']) }}
</div>

<div class="form-group">
    {{ Form::label('option_1', 'Opción 1', ['class' => 'font-weight-bold']) }}
    {{ Form::text('option_1', null, ['class' => 'form-control', 'id' => 'option_1']) }}
</div>

<div class="form-group">
    {{ Form::label('option_2', 'Opción 2', ['class' => 'font-weight-bold']) }}
    {{ Form::text('option_2', null, ['class' => 'form-control', 'id' => 'option_2']) }}
</div>

<div class="form-group">
    {{ Form::label('option_3', 'Opción 3', ['class' => 'font-weight-bold']) }}
    {{ Form::text('option_3', null, ['class' => 'form-control', 'id' => 'option_3']) }}
</div>

<div class="form-group">
    {{ Form::label('option_4', 'Opción 4', ['class' => 'font-weight-bold']) }}
    {{ Form::text('option_4', null, ['class' => 'form-control', 'id' => 'option_4']) }}
</div>

<div class="form-group">
    {{ Form::label('answer', 'Respuesta', ['class' => 'font-weight-bold']) }}
    {{ Form::text('answer', null, ['class' => 'form-control', 'id' => 'answer']) }}
</div>

<div class="form-group">
	{{ Form::label('slug', 'Estado', ['class' => 'font-weight-bold']) }}
	<label>
		{{ Form::radio('status', 1) }} Publicado
	</label>
	<label>
		{{ Form::radio('status', 0) }} Borrador
	</label>
</div>

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