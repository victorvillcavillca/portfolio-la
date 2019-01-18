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
    @include('admin.users.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                  <h2>Adicionar Participantes</h2>
                  <hr>
                  <h1>Evaluación:</h1>
                  <h6>{{ $evaluation->name }}</h6>
                </div>
                <!--Card content-->
                <div class="card-body">
                    {!! Form::open(['route' => 'evaluations.addsave', 'files' => true, 'id' =>'formId']) !!}
                        {{ Form::hidden('evaluation_id', $evaluation->id) }}
                        {{ Form::hidden('user_id', auth()->user()->id) }}

                        <div class="form-group">
                            {{ Form::label('student_id', 'Usuarios', ['class' => 'font-weight-bold']) }}
                            {{ Form::select('student_id', $users, null, ['class' => 'form-control']) }}
                        </div>

                        <div class="form-group">
                            <button type="submit"  class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> @lang('button.add')</button>
                        </div>

                    {!! Form::close() !!}
                    <!-- Table  -->
                    {{-- <table id="myTable" class="table table-hover" style="width: 100%"> --}}
                   <div class="table-responsive">
                      <table id="myTable" class="table table-hover dt-responsive" cellspacing="`0" width="100%">
                        {{-- <thead class="blue lighten-4"> --}}
                        <thead class="thead-dark">
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Correo</th>
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
@include('admin.partials.modal-delete', ['title' => trans('button.view'), 'description' => 'El '.trans('button.view')])
<!--Modal: Delete Confirmation-->

@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" ></script>

  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

  <!-- page script -->
  <script>
  $(document).ready(function() {
     let user_id = 0;
     let evaluation_id = {{$evaluation->id}};
     let table = $('#myTable').DataTable({
      "responsive": true,
      "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "/admin/users/dataevaluation",
          "data": {
            "evaluation_id": evaluation_id,
          }
        },
        "columns": [
          { "data": "id" },
          { "data": "name" },
          { "data": "email" },
          { "data": "created_at" },
          { "data": 'btn'},
        ],
        "columnDefs": [
        {
          "targets": [ 0 ],
          "visible": false,
          "searchable": false
        }
        ],
        "language": {
            "url": "/json/lang/es/pagination.json"
        }
      });

      $('#myTable tbody').on( 'click', 'a.delete_resource', function (e) {
        user_id = $(this).attr('data-id');
        let name = $(this).attr('data-name');

        $('#item-name').text(name);
        $('#modalDelete').modal('show');
      });

      $('#delete').click(function() {
        let url = 'evaluations/' + user_id+'/remove';
        // alert(url);
        axios.delete(url).then(response => { //deleting
          $('#modalDelete').modal('hide');
          table.ajax.reload();
          toastr.error(response.data.message); //message
        });
      });
    });
  </script>
@endsection
