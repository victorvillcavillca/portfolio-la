{{ Form::hidden('user_id', auth()->user()->id) }}

@if (isset($user) && $user->photo != '')
    <!-- Profile Image -->
    <div class="text-center">
        <img class="card-img-top" src="{{ asset($user->photo) }}" alt="Card image" style="width: 200px;">
         <h4 class="card-title">{{ $user->name }}</h4>
        <p class="card-text">{{ $user->bio }}</p>
    </div>
@else

@endif
<div class="form-group">
    {{ Form::label('image', 'Imagen', ['class' => 'font-weight-bold']) }}
    {{ Form::file('image') }}
</div>

<div class="form-group">
    {{ Form::label('name', 'Nombres') }}
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
    {{ Form::label('email', 'Correo') }}
    @if ($errors->has('email'))
    {{ Form::email('email', null, ['class' => "form-control is-invalid",'id' => 'email']) }}
    @else
    {{ Form::email('email', null, ['class' => "form-control",'id' => 'email']) }}
    @endif

    @if ($errors->has('email'))
    <span class="invalid-feedback">
        {{ $errors->first('email') }}
    </span>
    @endif
</div>

<div class="form-group">
    {{ Form::label('bio', 'Bibliografía') }}
    @if ($errors->has('bio'))
    {{ Form::textarea('bio', null, ['class' => "form-control is-invalid",'id' => 'bio']) }}
    @else
    {{ Form::textarea('bio', null, ['class' => "form-control",'id' => 'bio']) }}
    @endif

    @if ($errors->has('bio'))
    <span class="invalid-feedback">
        {{ $errors->first('bio') }}
    </span>
    @endif
</div>

<div class="form-group">
    <a href="{{ route('profiles.index') }}" class="btn btn-sm btn-secondary"><i class="fa fa-times"></i> @lang('button.cancel')</a>

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