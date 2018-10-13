@extends('layouts.dashboard')
@section('styles')


  <!-- DataTables -->
  {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.min.css"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('vendor/toastr.min.css') }}"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/mdb/css/addons/datatables.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css"> --}}





  
@endsection
@section('content')
<div class="container-fluid mt-5">
    
    <!-- Alerts -->    
    @include('admin.partials.alerts')
    <!-- /.Alerts -->

    <!-- Heading -->
    @include('admin.specialty-areas.partials.heading')
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
                      <a href="{{ route('specialty-areas.create') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                    </div>

                </div>
                <!--Card content-->
                <div class="card-body">

                    {{-- <canvas id="myChart"></canvas> --}}
                    
                    
                    <!-- Table  -->
                    {{-- <table id="myTable" class="table table-hover" style="width: 100%"> --}}
                    <table id="myTable" class="table table-hover dt-responsive" style="width: 100%;">
                    {{-- <table id="myTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%"> --}}
                        <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Creado</th>
                          <th>Acciones</th>
                        </tr>
                        </thead>
                    </table>        

                </div>

            </div>
            <!--/.Card-->

        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

</div>

<!--Modal: Login / Register Form Demo-->
<div class="modal fade" id="modalLRFormDemo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--Modal: Login / Register Form Demo-->
@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" ></script>
{{-- <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" ></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" ></script> --}}




  {{-- <script src="{{ asset('js/bootbox.min.js') }}"></script> --}}
  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
  {{-- <script src="{{ asset('js/toastr.min.js') }}"></script> --}}

  <!-- page script -->
  <script>
  $(document).ready(function() {
        // alert('d');
     let table = $('#myTable').DataTable({
      "responsive": true,
      "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        "ajax": "specialty-areas/data",
        "columns": [
          { "data": "id" },
          { "data": "name" },
          { "data": "description" },
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
          "processing": "Procesando...",
          "lengthMenu": 'Mostrar <select >'+
            '<option value="10">10</option>'+
            '<option value="25">25</option>'+
            '<option value="50">50</option>'+
            '<option value="100">100</option>'+
            '<option value="-1">Todos</option>'+
            '</select> registros',
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "infoPostFix": "",
            "search": "Buscar:",
            "url": "",
            "thousands": ",",
            "loadingRecords": "Cargando...",
            "paginate": {
              "first": "Primero",
              "last": "Último",
              "next": "Siguiente",
              "previous": "Anterior"
            },
          "aria": {
            "sortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }
      });

      $('#myTable tbody').on( 'click', 'a.delete_service', function (e) {
        e.preventDefault();
        let service_id = $(this).attr('data-id');
        // alert(service_id);
        // let service_name = $(this).attr('data-name');
        // let parent = $(this).parent("td").parent("tr");

        // this.fillKeep.id   = keep.id;
        // this.fillKeep.keep = keep.keep;
        // $('#modalLRFormDemo').modal('show');

        var url = 'specialty-areas/' + service_id;
      axios.delete(url).then(response => { //eliminamos
        // this.getKeeps(); //listamos
        table.ajax.reload();
        toastr.success('Eliminado correctamente'); //mensaje
      });
        // bootbox.dialog({
        //   message: '<b>¿Estás seguro que quieres Eliminar?</b><br>'+service_name,
        //   title: "<i class='fa fa-trash'></i> Eliminar servicio name!",
        //   buttons: {
        //     success: {
        //       label: 'Cancelar',
        //       className: "btn-warning",
        //       callback: function() {
        //          $('.bootbox').modal('hide');
        //       }
        //     },
        //     danger: {
        //       label: "Eliminar!",
        //       className: "btn-danger",
        //       callback: function() {
        //         $.get('services/'+service_id+'/remove', {})
        //           .done(function(response){
        //               table.ajax.reload();
        //               // Display an info
        //               toastr.info('Servicio Eliminado')
        //           })
        //           .fail(function(){
        //               bootbox.alert('Algo salió mal ...');
        //           })
        //       }
        //     }
        //   }
        // });
      });
    });
  </script>
@endsection
