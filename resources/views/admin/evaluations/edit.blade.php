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
                      <a href="{{ route('questions.create', ['evaluation_id' => $evaluation->id]) }}" class="pull-right btn btn-sm btn-primary">
                        Agregar preguntas
                    </a>
                    </div>

                </div>
                <!--Card content-->
                <div class="card-body">

                  <div class="table-responsive">
                    <table id="myTable" class="table table-hover dt-responsive" cellspacing="`0" width="100%">
                        <thead class="thead-dark">
                        <tr>
                          <th>Id</th>
                          <th>Pregunta</th>
                          <th>Respuesta</th>
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
</div>

<!--Modal: Delete Confirmation-->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Pregunta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Esta seguro de eliminar la Pregunta?</p>
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
            "evaluation_id": {{$evaluation->id}},
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
            "url": "/json/lang/es/pagination.json"
        }
      });

      $('#myTable tbody').on( 'click', 'a.delete_question', function (e) {
        question_id = $(this).attr('data-id');
        $('#modalDelete').modal('show');
      });

      $( "#delete" ).click(function() {
        var url = '/admin/questions/' + question_id;
        axios.delete(url).then(response => { //eliminamos
          $('#modalDelete').modal('hide');
          table.ajax.reload();
          toastr.success('Eliminado correctamente la Pregunta'); //mensaje
        });
      });
  });
</script>
@endsection