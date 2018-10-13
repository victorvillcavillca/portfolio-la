<a href="{{ route('specialty-areas.show', $id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Ver"><i class="fa fa-eye"></i> @lang('button.view')</a>
@if(true)
<a href="{{ route('specialty-areas.edit', $id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil"></i> @lang('button.edit')</a>
@endif
<a href="javascript:void(0)" data-id="{{ $id }}" data-name="{{ $name }}" class="delete_service btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="{{ 'Eliminar' }}"><i class="fa fa-trash"></i> @lang('button.delete')</a>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                    data-target="#modalLRFormDemo">Medium </button>



