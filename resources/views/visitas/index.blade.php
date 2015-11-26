@extends('app')

@section('titulo')
    <h1>Visitas</h1>
@stop

@section('estilos')
    <!-- Data Tables -->
    <link href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <br>
    <div class="row">
        <div class="col-lg-3">
            <a href="{{ url('visitas/create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar visita</button></a>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <i class="fa fa-bookmark"></i>&nbsp;<span>Visitas</span>
                    <span id="mysearch" class="pull-right"><i id="icon_search" class="fa fa-search">&nbsp;</i><input id="search" type="text"> </span>
                </div>
                <div class="panel-body table-responsive">
                    <table id="tabla-visitas" class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Comunidad</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($visitas as $visita)
                            <tr>
                                <td>{{ date('d-m-Y', strtotime($visita->fecha)) }}</td>
                                <td>{{ $visita->comunidad->nombre }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <!-- Editar -->
                                            <a href="{{ url('visitas/'.$visita->id_visita.'/edit')  }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </li>
                                        <li>

                                            <button onclick="getVisitaId({{ $visita->id_visita }})" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_visita">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>

                                        </li>
                                    </ul>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete tag -->
    <div class="modal fade" id="modal_visita" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modaluser">¿Eliminar este niño?</h4>
                </div>
                <div class="modal-body">
                    <button id="borrar_padre" class="btn btn-danger">Eliminar visita</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("#li-visitas").addClass('active');
        var token = "{{ csrf_token() }}";
    </script>

    <!-- Data Tables -->
    <script src="{{ asset('public/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script>
        var tabla = $('#tabla-visitas').dataTable({
            "aaSorting": [],
            "bLengthChange": false,
            "iDisplayLength": 100,
            "bInfo": false
        });

        // Search function
        $('#search').keyup(function(){
            tabla.fnFilter($(this).val());
        });
    </script>

    <!-- Delete -->
    <script>
        // Redirect
        function redirecciono_visitas(){
            window.location="{{URL::to('ninos')}}";
        }

        // Get id tag
        var id_visita = '';
        function getVisitaId(id){
            id_visita = id;
        }

        // Delete tag
        $('#borrar_tag').click(function(){

            // Ajax request
            $.ajax({
                url: 'visitas/getBorrado',
                type: 'GET',
                data: { "id_visita": id_visita, "_token": token },
                cache: false,
                success: function(response)
                {
                    console.log(response);
                    redirecciono_visitas();


                }
            });
        });
    </script>
@stop