<a href="{{ route('inscriptions.show', $id) }}" class="btn btn-default btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i>
	{{-- @lang('button.view') --}}
</a>
@if(true)
<a href="{{ route('inscriptions.edit', $id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i>
	{{-- @lang('button.edit') --}}
</a>
@endif
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip()
})
// Tooltip Doc reference
// https://mdbootstrap.com/legacy/4.3.2/?page=javascript/tooltips
</script>


