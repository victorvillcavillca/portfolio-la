<a href="{{ route('categories.show', $id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.view')"><i class="fa fa-eye"></i></a>
@if(true)
<a href="{{ route('categories.edit', $id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.edit')"><i class="fa fa-pencil"></i></a>
@endif
<a href="javascript:void(0)" data-id="{{ $id }}" data-name="{{ $name }}" class="delete_category btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.delete')"><i class="fa fa-trash"></i></a>

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>