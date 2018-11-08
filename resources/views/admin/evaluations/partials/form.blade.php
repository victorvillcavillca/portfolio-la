{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
	{{ Form::label('matter_id', 'Categoría', ['class' => 'font-weight-bold']) }}
	{{ Form::select('matter_id', $matters, null, ['class' => 'form-control']) }}
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
    {{ Form::label('time', 'Tiempo', ['class' => 'font-weight-bold']) }}
    {{ Form::number('time', null, ['class' => 'form-control', 'id' => 'time']) }}
</div>
<div class="form-group">
    {{ Form::label('end_date', 'Fecha final del examen', ['class' => 'font-weight-bold']) }}
    {{ Form::date('end_date', null, ['class' => 'form-control', 'id' => 'end_date']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Descripción', ['class' => 'font-weight-bold']) }}
    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '2']) }}
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
    <button type="submit"  class="btn btn-sm btn-primary"><i class="fa fa-save"></i> @lang('button.save')</button>
</div>

