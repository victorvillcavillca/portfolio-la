@extends('layouts.admin-dash')

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
@endsection

@section('content')
<div class="container-fluid mt-5">

    <!-- Alerts -->
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.matters.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                  {{-- <h3 class="card-title">Servicios</h3> --}}
                  <div class="btn-group pull-right">
                    <a href="{{ route('matters.create') }}" class="pull-right btn btn-sm btn-primary"><i class="fa fa-plus"></i> @lang('button.create')</a>
                  </div>

                </div>
                <!--Card content-->
                <div class="card-body">

                    <div class="table-responsive">
                      <table id="myTable" class="table table-hover dt-responsive" cellspacing="`0" width="100%">
                          <thead class="thead-dark">
                          <tr>
                            <th>Id</th>



                            {{-- <th><input type="checkbox"  id="bulkDelete"  /> <button id="deleteTriger">Delete</button></th> --}}
                            <th style="width: 50px;"><input type="checkbox"  id="bulkDelete"/> <a href="javascript:void(0)" id="deleteTriger" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></a></th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Creado</th>
                            <th style="width: 82px;">Acciones</th>
                          </tr>
                          </thead>
                      </table>
                    </div>

                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</div>

<!--Modal: Delete Confirmation-->
@include('admin.partials.modal-delete', ['title' => trans('matter.matter'), 'description' => 'La '.trans('matter.matter')])
<!--Modal: Delete Confirmation-->

@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" ></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" ></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" ></script>

  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  {{-- <script src="{{ asset('js/toastr.min.js') }}"></script> --}}

  <!-- page script -->
  <script>
  $(document).ready(function() {
     let matter_id = 0;

     let table = $('#myTable').DataTable({
      "responsive": true,
      "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "matters/data",
        "columns": [
          { "data": "id" },
          { "data": 'check' },
          { "data": "name" },
          { "data": "status" },
          { "data": "created_at" },
          { "data": 'btn'},
        ],
        "columnDefs": [
        {
          "targets": [ 0 ],
          "visible": false,
          "searchable": false
        },
        { "orderable": false, "targets": 1 },
        ],
        "language": {
            "url": "/json/lang/es/pagination.json"
        }
      });

      $('#myTable tbody').on( 'click', 'a.delete_matter', function (e) {
        matter_id = $(this).attr('data-id');
        let name = $(this).attr('data-name');

        $('#item-name').text(name);
        $('#modalDelete').modal('show');
      });

      $("#delete").click(function() {
        let url = 'matters/' + matter_id;
        axios.delete(url).then(response => { //deleting
          $('#modalDelete').modal('hide');
          table.ajax.reload();
          toastr.error(response.data.message); //message
        });
      });

      $("#bulkDelete").click(function() {
        let status = this.checked;
        $(".deleteRow").each( function() {
            $(this).prop("checked",status);
        });
      });

      $("#deleteTriger").click(function() {
        if( $('.deleteRow:checked').length > 0 ) {  // at-least one checkbox checked
          var ids = [];
          $('.deleteRow').each(function(){
              if($(this).is(':checked')) {
                  ids.push($(this).val());
              }
          });

          let ids_string = ids.toString();  // array to string conversion
          let url = 'matters/' + ids_string;
          axios.delete(url).then(response => { //deleting
            $('#modalDelete').modal('hide');
            table.ajax.reload();
            toastr.error(response.data.message); //message
          });
        }
      });

    });
  </script>
@endsection
