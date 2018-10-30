@extends('layouts.tim-admin')

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
    @include('admin.evaluations.partials.heading')
    <!-- Heading -->

    <!--Grid row-->
    <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-12 mb-4">

            <!--Card-->
            <div class="card">
                <div class="card-header">
                    Editar Area Especialidad
                </div>

                <!-- errors -->
                @if ($errors->any())
                  @include('admin.partials.errors')
                @endif
                <!-- /.errors -->

                <!--Card content-->
                <div class="card-body">
                    {!! Form::model($evaluation, ['route' => ['evaluations.update', $evaluation->id], 'method' => 'PUT']) !!}

                        @include('admin.evaluations.partials.form')

                    {!! Form::close() !!}
                </div>

            </div>
            <!--/.Card-->

            <!--Card-->
            <div class="card mt-4">
                <div class="card-header">
                  Preguntas
                  <div class="btn-group pull-right">
                      <a href="{{ route('questions.create') }}" class="pull-right btn btn-sm btn-primary">
                        Crear
                    </a>
                    </div>

                </div>
                <!--Card content-->
                <div class="card-body">

                    {{-- <div class="table-responsive"> --}}
                      <table id="myTable" class="table table-striped table-bordered table-sm dt-responsive" cellspacing="`0" width="100%">
                          <thead>
                          <tr>
                            <th>Id</th>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                          </tr>
                          </thead>
                      </table>
                    {{-- </div> --}}

                </div>

            </div>
            <!--/.Card-->
        </div>
        <!--Grid column-->

    </div>
</div>
@endsection

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" ></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" ></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" ></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" ></script>

  <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/validate/jquery.validate.min.js') }}"></script>
{{-- <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script> --}}
<script>
  $(document).ready(function(){

      $("#name, #slug").stringToSlug({
          callback: function(text){
              $('#slug').val(text);
          }
      });

      $("#formId" ).validate({
        errorClass: 'text-danger',
        rules: {
          name: {
            required: true
          },
          slug: {
            required: true
          },
          order: {
            required: true
          },
          // image: {
          //   required: true
          // },
          // filename: {
          //   required: true
          // },
        }
      });

      let question_id = 0;
     let table = $('#myTable').DataTable({
      "responsive": true,
      "order": [[ 0, "desc" ]],
        "processing": true,
        "serverSide": true,
        // "ajax": "questions/data",
        "ajax": {
          "url": "/admin/questions/data",
          "data": {
            "evaluation_id": 1,
          }
        },
        "columns": [
          { "data": "id" },
          { "data": "question" },
          { "data": "answer" },
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

      $('#myTable tbody').on( 'click', 'a.delete_area_specialty', function (e) {
        question_id = $(this).attr('data-id');
        $('#modalDelete').modal('show');
      });

      $( "#delete" ).click(function() {
        var url = 'questions/' + question_id;
        axios.delete(url).then(response => { //eliminamos
          $('#modalDelete').modal('hide');
          table.ajax.reload();
          toastr.success('Eliminado correctamente la Pregunta'); //mensaje
        });
      });
  });
</script>
@endsection