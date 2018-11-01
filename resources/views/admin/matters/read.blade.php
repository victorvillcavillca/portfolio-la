@extends('layouts.tim-admin')

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
                      <a href="{{ route('matters.create') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                    </div>

                </div>
                <!--Card content-->
                <div class="card-body">

                    <div class="table-responsive">
                      {{ $dataTable->table(['id' => 'users','class' => 'table table-striped table-bordered table-sm dt-responsive'], true) }}

                      {{-- {{ $dataTable->table(['id' => 'users'])}} --}}

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
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar __('Materia')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro de eliminar el Area Especialidad?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="delete">Si</button>
            </div>
        </div>
    </div>
</div>
<!--Modal: Delete Confirmation-->
@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" ></script>

  {{-- Editor --}}
  <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
  <script src="{{asset('vendor/editor/js/dataTables.editor.min.js')}}"></script>

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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });

        var editor = new $.fn.dataTable.Editor({
            ajax: "/users",
            table: "#users",
            display: "bootstrap",
            fields: [
                {label: "Nombre:", name: "name"},
                {label: "Apellido:", name: "last_name"},
                {label: "Email:", name: "email"},
                {label: "Password:", name: "password", type: "password"}
            ]
        });

        $('#users').on('click', 'tbody td:not(:first-child)', function (e) {
            editor.inline(this);
        });

        {{ $dataTable->generateScripts() }}
    })
</script>
@endsection

