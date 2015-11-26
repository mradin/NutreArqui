@extends('app')

@section('titulo')
    <h1>Niños</h1>
@stop

@section('estilos')
    <!-- Data Tables -->
    <link href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <br>
    <div class="row">
        <div class="col-lg-3">
            <a href="{{ url('ninos/create') }}"><button class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp;&nbsp;Agregar niño</button></a>
        </div>
    </div>

    <br><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <i class="fa fa-bookmark"></i>&nbsp;<span>Niños</span>
                    <span id="mysearch" class="pull-right"><i id="icon_search" class="fa fa-search">&nbsp;</i><input id="search" type="text"> </span>
                </div>
                <div class="panel-body table-responsive">
                    <table id="tabla-ninos" class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>CURP</th>
                            <th>Edad</th>
                            <th>Fecha de nacimiento</th>
                            <th>Padre</th>
                            <th>Comunidad</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($ninos as $nino)
                            <tr>
                                <td>{{ $nino->nombre }}</td>
                                <td>{{ $nino->apellidos }}</td>
                                <td>{{ $nino->curp }}</td>
                                <td>{{ $nino->edad }}</td>
                                <td>{{ date('d-m-Y', strtotime($nino->fec_nac)) }}</td>
                                <td>{{ $nino->padre->nombre.' '.$nino->padre->apellidos }}</td>
                                <td>{{ $nino->comunidad->nombre }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            <!-- Editar -->
                                            <a href="{{ url('ninos/'.$nino->id_nino.'/edit')  }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                        </li>
                                        <li>

                                            <button onclick="getNinoId({{ $nino->id_nino }})" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_nino">
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
    <div class="modal fade" id="modal_nino" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modaluser">¿Eliminar este niño?</h4>
                </div>
                <div class="modal-body">
                    <button id="borrar_padre" class="btn btn-danger">Eliminar niño</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("#li-ninos").addClass('active');
        var token = "{{ csrf_token() }}";
    </script>

    <!-- Data Tables -->
    <script src="{{ asset('public/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script>
        var tabla = $('#tabla-ninos').dataTable({
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
        function redirecciono_ninos(){
            window.location="{{URL::to('ninos')}}";
        }

        // Get id tag
        var id_padre = '';
        function getNinoId(id){
            id_padre = id;
        }

        // Delete tag
        $('#borrar_padre').click(function(){

            // Ajax request
            $.ajax({
                url: 'ninos/getBorrado',
                type: 'GET',
                data: { "id_nino": id_padre, "nombre": "X", "_token": token },
                cache: false,
                success: function(response)
                {
                    console.log(response);
                    redirecciono_ninos();


                }
            });
        });
    </script>
@stop