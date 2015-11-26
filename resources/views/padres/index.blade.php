@extends('app')

@section('titulo')
    <h1>Padres de familia</h1>
@stop

@section('estilos')
    <!-- Data Tables -->
    <link href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <br>
    <div class="row">
        <div class="col-lg-3">
            <a href="{{ url('padres/create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar padre</button></a>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <i class="fa fa-bookmark"></i>&nbsp;<span>Padres</span>
                    <span id="mysearch" class="pull-right"><i id="icon_search" class="fa fa-search">&nbsp;</i><input id="search" type="text"> </span>
                </div>
                <div class="panel-body table-responsive">
                    <table id="tabla-padres" class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Curp</th>
                            <th>Sexo</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($padres as $padre)
                            <tr>
                                <td>{{ $padre->nombre }}</td>
                                <td>{{ $padre->apellidos }}</td>
                                <td>{{ $padre->curp }}</td>
                                <td>{{ $padre->tipo }}</td>

                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <!-- Editar -->
                                            <a href="{{ url('padres/'.$padre->id_padre.'/edit')  }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </li>
                                        <li>

                                            <button onclick="getPadreId({{ $padre->id_padre }})" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_padre">
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
    <div class="modal fade" id="modal_padre" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modaluser">¿Eliminar este padre de familia?</h4>
                </div>
                <div class="modal-body">
                    <button id="borrar_padre" class="btn btn-danger">Eliminar padre</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("#li-padres").addClass('active');
        var token = "{{ csrf_token() }}";
    </script>

    <!-- Data Tables -->
    <script src="{{ asset('public/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script>
        var tabla = $('#tabla-padres').dataTable({
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
        function redirecciono_padres(){
            window.location="{{URL::to('padres')}}";
        }

        // Get id tag
        var id_padre = '';
        function getPadreId(id){
            id_padre = id;
        }

        // Delete tag
        $('#borrar_padre').click(function(){

            // Ajax request
            $.ajax({
                url: 'padres/getBorrado',
                type: 'GET',
                data: { "id_padre": id_padre, "nombre": "X", "_token": token },
                cache: false,
                success: function(response)
                {
                    console.log(response);
                    redirecciono_padres();


                }
            });
        });
    </script>
@stop