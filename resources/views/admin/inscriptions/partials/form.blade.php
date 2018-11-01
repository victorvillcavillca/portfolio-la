<div class="form-group">
    {{ Form::label('name', 'Nombre de la categoría') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripción') }}
    {{ Form::textarea('description', null, ['class' => 'form-control']) }}
</div>
<div class="form-group  {{ $errors->has('user_id') ? 'has-error' : '' }}">
	{{ Form::label('user_id', 'Usuarios', array('class' => 'control-label')) }}

	{!! Form::select('users[]', $users, null, ['multiple' => true, 'class' => 'form-contro']) !!}
	<span class="help-block">{{ $errors->first('user_id', ':message') }}</span>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>





@section('scripts')

@endsection