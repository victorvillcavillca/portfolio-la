<a href="{{ route('matters.show', $id) }}" class="btn btn-default btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i>
	{{-- @lang('button.view') --}}
</a>
@if(true)
<a href="{{ route('matters.edit', $id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i>
	{{-- @lang('button.edit') --}}
</a>
@endif
<a href="javascript:void(0)" data-id="{{ $id }}" data-name="{{ $name }}" class="delete_area_specialty btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="{{ 'Eliminar' }}"><i class="fa fa-trash"></i></a>
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})
// Tooltip Doc reference
// https://mdbootstrap.com/legacy/4.3.2/?page=javascript/tooltips
</script>


