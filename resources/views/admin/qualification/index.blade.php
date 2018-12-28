@extends('layouts.admin-dash')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    @lang('admin/qualification.qualifications')
    <small>@lang('admin/admin.list')</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ URL::to('admin') }}"><i class="fa fa-dashboard"></i>@lang('site/menu.home')</a></li>
    <li>@lang('admin/qualification.qualifications')</li>
    <li class="active">@lang('admin/qualification.qualifications')</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">{!! trans('admin/qualification.qualifications') !!}</h3>
                <!-- will be used to show any messages -->
                @if (Session::has('status'))
                <div class="callout callout-success">
                    <p>{{ Session::get('status') }}</p>
                </div>
                @endif

                <div class="btn-group pull-right">
                  <a href="{{ URL::to('admin/qualifications/create') }}" class="btn btn-primary"><i class='fa fa-th-list'></i> Nuevo Calificación</a>
                </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>{!! trans('admin/qualification.category') !!}</th>
                            <th>{!! trans('admin/qualification.maximum_score') !!}</th>
                            <th>{!! trans('admin/qualification.initial_percentage') !!}</th>
                            <th>{!! trans('admin/qualification.initial_score') !!}</th>
                            <th>{!! trans('admin/qualification.final_percentage') !!}</th>
                            <th>{!! trans('admin/qualification.final_score') !!}</th>
                            <th>{!! trans('admin/admin.action') !!}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
                        <tr>
                           <th>Id</th>
                           <th>{!! trans('admin/qualification.category') !!}</th>
                           <th>{!! trans('admin/qualification.maximum_score') !!}</th>
                           <th>{!! trans('admin/qualification.initial_percentage') !!}</th>
                           <th>{!! trans('admin/qualification.initial_score') !!}</th>
                           <th>{!! trans('admin/qualification.final_percentage') !!}</th>
                           <th>{!! trans('admin/qualification.final_score') !!}</th>
                           <th>{!! trans('admin/admin.action') !!}</th>
                        </tr>
                    </tfoot>
                </table>
              </div>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
</section>

<div id="remove_message" class="bottom-left"></div>
<link href="{{ asset('css/flash-message.css') }}" rel="stylesheet">

<script src="{{ asset('js/bootbox.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu_scores").addClass('active');
        $("#submenu_qualification").addClass('active');

        var table = $('#myTable').DataTable( {
        "order": [[ 0, "desc" ]],
        "columnDefs": [ {
            "targets": 7,
              "render": function ( data, type, row ) {
                  return '<a href="/admin/qualifications/'+row[0]+'/edit" class="btn btn-xs btn-warning" data-toggle="tooltip" data-placement="top" title="{!! trans('modal.edit') !!}"><i class="glyphicon glyphicon-pencil"></i></a>'+' '+'<a href="javascript:void(0)" data-id="'+row[0]+'" data-name="'+row[1]+'" class="delete_qualification btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="{!! trans('modal.delete') !!}"><i class="fa fa-trash"></i></a href>';
              },
            },
            {"visible": false, "targets": [ 0 ] }
        ],
        "processing": true,
        "serverSide": true,
        "ajax": "qualifications/data",
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
        });

        $('#myTable tbody').on( 'click', 'a.delete_qualification', function (e) {
            e.preventDefault();
            var qualification_id = $(this).attr('data-id');
            var qualification_name = $(this).attr('data-name');
            var parent = $(this).parent("td").parent("tr");

            bootbox.dialog({
              message: '<b>¿Estás seguro que quieres Eliminar?</b><br>'+qualification_name,
              title: "<i class='glyphicon glyphicon-trash'></i> Eliminar {!! trans('admin/qualification.qualification') !!}!",
              buttons: {
                success: {
                  label: 'Cancelar',
                  className: "btn-warning",
                  callback: function() {
                     $('.bootbox').modal('hide');
                  }
                },
                danger: {
                  label: "Eliminar!",
                  className: "btn-danger",
                  callback: function() {
                    $.get('qualifications/'+qualification_id+'/remove', {})
                      .done(function(response){
                        console.log(response);
                          table.ajax.reload();
                          $('#remove_message').jGrowl(response['message'], {theme: 'callout-danger'});
                      })
                      .fail(function(){
                          bootbox.alert('Algo salió mal ...');
                      })
                  }
                }
              }
            });
        } );
    });
    </script>
@endsection