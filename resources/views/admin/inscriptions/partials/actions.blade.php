<a href="{{ route('inscriptions.show', $id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.view')"><i class="fa fa-eye"></i></a>
@if(true)
<a href="{{ route('inscriptions.edit', $id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.edit')"><i class="fa fa-pencil"></i></a>
@endif

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>