@extends('layouts.admin-dash')

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

  {{-- editor --}}
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/select/1.2.2/css/select.bootstrap4.min.css">
  {{-- editor  --}}

  {{-- <link rel="stylesheet" href="{{ asset('editor/css/dataTables.editor.css')}}"> --}}
  <link rel="stylesheet" href="{{ asset('vendor/editor/css/editor.bootstrap4.css')}}">
  {{-- ./editor --}}

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
@endsection

@section('content')
<div class="container-fluid mt-5">

    <!-- Alerts -->
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.managements.partials.heading')
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
                      <a href="{{ route('managements.create') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                    </div>

                </div>
                <!--Card content-->
                <div class="card-body">

                    <div class="table-responsive">
                      {{ $dataTable->table(['id' => 'managements','class' => 'table table-hover dt-responsive'], true) }}

                      {{-- <table id="myTable" class="table table-striped table-bordered table-sm dt-responsive" cellspacing="`0" width="100%">
                          <thead>
                          <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                          </tr>
                          </thead>
                      </table> --}}
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
@include('admin.partials.modal-delete', ['title' => trans('management.management'), 'description' => 'La '.trans('management.management')])
<!--Modal: Delete Confirmation-->

@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" ></script>

  {{-- Editor --}}
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>

  <script src="{{asset('vendor/editor/editor.dataTables.js')}}"></script>

  <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
  <script src="{{asset('vendor/editor/js/editor.bootstrap4.min.js')}}"></script>
  {{-- ./Editor --}}


  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" ></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" ></script>


  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  {{-- <script src="{{ asset('js/toastr.min.js') }}"></script> --}}
  {{-- {!! $dataTable->scripts() !!} --}}
  <script>
    $(function() {
      let management_id = 0;

      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': '{{csrf_token()}}'
          }
      });

      // $('#managements').dataTable( {
      //   "columnDefs": [
      //     { "name": "My column title", "targets": 1 }
      //   ]
      // } );

      let editor = new $.fn.dataTable.Editor({
          ajax: "/admin/managements",
          table: "#managements",
          columnDefs: [
            { "name": "My column title"}
          ],
          i18n: {
              create: {
                  button: "Crear",
                  title:  "Crear nueva Gestion",
                  submit: "Guardar"
              },
              edit: {
                  button: "Editar",
                  title:  "Actualizar Gestion",
                  submit: "Guardar"
              },
              remove: {
                  button: "Eliminar",
                  title:  "Eliminar Gestion",
                  submit: "Eliminar",
                  confirm: {
                      _: "¿Está seguro de Eliminar? %d Gestiones?",
                      1: "¿Está seguro de Eliminar? 1 Gestion?"
                  }
              }
          },
          display: "bootstrap",
          fields: [
              {label: "Nombre:", name: "name"},
              {label: "Descripción:", name: "description"},
              {label: "Estado:", name: "status"},
              // {label: "Password:", name: "password", type: "password"}
          ]
      });

      $('#managements').on('click', 'tbody td:not(:first-child)', function (e) {
          editor.inline(this);
      });

      {{ $dataTable->generateScripts() }}

      $('#managements tbody').on( 'click', 'a.delete_management', function (e) {
        management_id = $(this).attr('data-id');
        let name = $(this).attr('data-name');

        $('#item-name').text(name);
        $('#modalDelete').modal('show');
      });

      $( "#delete" ).click(function() {
        let url = 'managements/' + management_id;
        axios.delete(url).then(response => { //deleting
          $('#modalDelete').modal('hide');
          editor.table.ajax.reload();
          toastr.error(response.data.message); //message
        });
      });

    })
</script>
@endsection
