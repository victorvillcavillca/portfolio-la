{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('category_id', 'Categorías') }}
	{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Nombre de la Publicación', ['class' => 'font-weight-bold']) }}
    @if ($errors->has('name'))
    {{ Form::text('name', null, ['class' => "form-control is-invalid",'id' => 'name']) }}
    @else
    {{ Form::text('name', null, ['class' => "form-control",'id' => 'name']) }}
    @endif

	@if ($errors->has('name'))
    <span class="invalid-feedback">
    	{{ $errors->first('name') }}
  	</span>
	@endif
</div>

<div class="form-group">
    {{ Form::label('slug', 'URL amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control-plaintext', 'id' => 'slug', 'readonly']) }}
</div>
{{-- <div class="form-group">
    {{ Form::label('image', 'Imagen') }}
    {{ Form::file('image') }}
</div> --}}

<div class="form-group">
    {{ Form::label('image', 'Imagen', ['class' => 'font-weight-bold']) }}
    {{ Form::file('image') }}

   {{--  {{ Form::label('image', 'Imagen', ['class' => 'font-weight-bold']) }}
    @if ($errors->has('image'))
    {{ Form::file('image', null, ['class' => "form-control is-invalid",'id' => 'image']) }}
    @else
    {{ Form::file('image', null, ['class' => "form-control",'id' => 'image']) }}
    @endif --}}

	@if ($errors->has('image'))
    <span class="invalid-feedback">
    	{{ $errors->first('image') }}
  	</span>
	@endif

    {{-- @if ($errors->has('image'))
    <div class="help-blok text-danger" style="font-size: 80%;">
    	{{ $errors->first('image') }}
  	</div>
	@endif --}}
</div>

{{-- <div class="form-group">
	{{ Form::label('slug', 'Estado') }}
	<label>
		{{ Form::radio('status', 'PUBLISHED') }} Publicado
	</label>
	<label>
		{{ Form::radio('status', 'DRAFT') }} Borrador
	</label>
</div> --}}

<div class="form-group">
	{{ Form::label('slug', 'Estado', ['class' => 'font-weight-bold']) }}
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
	{{ Form::label('tags', 'Etiquetas') }}
	<div>
	@foreach($tags as $tag)
		<label>
			{{ Form::checkbox('tags[]', $tag->id) }} {{ $tag->name }}
		</label>
	@endforeach
	</div>

	@if ($errors->has('tags'))
    <div class="help-blok text-danger" style="font-size: 80%;">
    	{{ $errors->first('tags') }}
  	</div>
	@endif
</div>

<div class="form-group">
    {{ Form::label('excerpt', 'Extracto') }}
    @if ($errors->has('excerpt'))
    {{ Form::textarea('excerpt', null, ['class' => 'form-control is-invalid', 'rows' => '2']) }}
    @else
    {{ Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => '2']) }}
    @endif

	@if ($errors->has('excerpt'))
    <span class="invalid-feedback">
    	{{ $errors->first('excerpt') }}
  	</span>
	@endif
</div>

<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}

	@if ($errors->has('body'))
    <div class="help-blok text-danger" style="font-size: 80%;">
    	{{ $errors->first('body') }}
  	</div>
	@endif
</div>
<hr>
<div class="form-group">
    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-times"></i> @lang('button.cancel')</a>

    <button type="submit"  class="pull-right btn btn-sm btn-primary"><i class="fa fa-save"></i> @lang('button.save')</button>
</div>

@section('scripts')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
{{-- <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.8.3/tinymce.min.js"></script>
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });

	    CKEDITOR.config.height = 100;
		CKEDITOR.config.width  = 'auto';

		CKEDITOR.replace('excerpt');

	// tinymce.init({
 //      selector: 'textarea#body',
 //      height: 100,
 //      menubar: false,
 //      content_css: '//www.tinymce.com/css/codepen.min.css'
 //    });

    tinymce.init({
      selector: 'textarea#body',
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