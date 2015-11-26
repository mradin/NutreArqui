@extends('app')

@section('titulo')
    <h1>Comunidades</h1>
@stop

@section('estilos')
    <!-- Data Tables -->
    <link href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <br>
    <div class="row">
        <div class="col-lg-3">
            <a href="{{ url('comunidades/create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar comunidad</button></a>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <i class="fa fa-map-marker"></i>&nbsp;<span>Comunidades</span>
                    <span id="mysearch" class="pull-right"><i id="icon_search" class="fa fa-search">&nbsp;</i><input id="search" type="text"> </span>
                </div>
                <div class="panel-body table-responsive">
                    <table id="tabla-comunidades" class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($comunidades as $comunidad)
                            <tr>
                                <td>{{ $comunidad->nombre }}</td>
                                <td>{{ $comunidad->estado }}</td>

                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <!-- Editar -->
                                            <a href="{{ url('comunidades/'.$comunidad->id_comunidad.'/edit')  }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </li>
                                        <li>

                                            <button onclick="getComunidadId({{ $comunidad->id_comunidad }})" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_comunidad">
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
    <div class="modal fade" id="modal_comunidad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modaluser">¿Eliminar esta comunidad?</h4>
                </div>
                <div class="modal-body">
                    <button id="borrar_padre" class="btn btn-danger">Eliminar comunidad</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("#li-comunidades").addClass('active');
        var token = "{{ csrf_token() }}";
    </script>

    <!-- Data Tables -->
    <script src="{{ asset('public/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script>
        var tabla = $('#tabla-comunidades').dataTable({
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
        function redirecciono_comunidades(){
            window.location="{{URL::to('comunidades')}}";
        }

        // Get id tag
        var id_comunidad = '';
        function getComunidadId(id){
            id_comunidad = id;
        }

        // Delete tag
        $('#borrar_padre').click(function(){

            // Ajax request
            $.ajax({
                url: 'comunidades/getBorrado',
                type: 'GET',
                data: { "id_comunidad": id_comunidad, "nombre": "X", "_token": token },
                cache: false,
                success: function(response)
                {
                    console.log(response);
                    redirecciono_comunidades();


                }
            });
        });
    </script>
@stop