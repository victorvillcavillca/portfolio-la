<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar {{ isset($title)?$title:'Item' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Está seguro de eliminar? {{ isset($description)?$description:'El Item' }} <strong id="item-name"></strong></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> @lang('button.cancel')</button>

                <button type="button" class="btn btn-sm btn-primary" id="delete"><i class="fa fa-check"></i> @lang('button.yes')</button>
            </div>
        </div>
    </div>
</div>