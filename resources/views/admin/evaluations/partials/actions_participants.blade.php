<a href="{{ route('evaluations.add', $id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.add_participants')"><i class="fa fa-plus"></i></a>
@if(true)
<a href="{{ route('evaluations.view', $id) }}" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.view_participants')"><i class="fa fa-eye"></i></a>
@endif

@if(true)
<a href="{{ route('evaluations.result', $id) }}" class="btn btn-dark btn-sm" data-toggle="tooltip" data-placement="top" title="@lang('button.result_participants')"><i class="fa fa-pencil"></i></a>
@endif

<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>