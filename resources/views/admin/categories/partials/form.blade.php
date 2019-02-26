<div class="form-group">
    {{ Form::label('name', 'Nombre de la Categoría') }}
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
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    <a href="{{ route('categories.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-times"></i> @lang('button.cancel')</a>

    <button type="submit"  class="pull-right btn btn-sm btn-primary"><i class="fa fa-save"></i> @lang('button.save')</button>
</div>

@section('scripts')
<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });
	});
</script>
@endsection