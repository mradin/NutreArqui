@extends('app')

@section('titulo')
    <h1>Usuarios</h1>
@stop

@section('estilos')
    <!-- Data Tables -->
    <link href="{{ asset('public/plugins/datatables/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" />
@stop

@section('content')

    <br><br>
    <div class="row">
        <div class="col-xs-18 col-lg-8">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <i class="fa fa-users">&nbsp;</i> <span>Hay {{ count($usuarios) }} usuarios</span>
                    <span id="mysearch" class="pull-right"><i id="icon_search" class="fa fa-search">&nbsp;</i><input id="search" type="text"> </span>
                </div><!-- /.box-header -->
                <div class="panel-body table-responsive">
                    <table id="tabla-usuarios" class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($usuarios as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <ul class="list-inline">
                                        <li>
                                            {!! Form::open(array('method'=>'DELETE', 'route'=>array('usuarios.destroy', $user->id))) !!}
                                            <button type="submit" class="btn btn-danger btn-xs">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach


                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


@stop

@section('scripts')
    <script>
        $("#li-usuarios").addClass('active');
    </script>

    <!-- Data Tables -->
    <script src="{{ asset('public/plugins/datatables/jquery.dataTables.js') }}" type="text/javascript"></script>
    <script src="{{ asset('public/plugins/datatables/dataTables.bootstrap.js') }}" type="text/javascript"></script>
    <script>
        var tabla = $('#tabla-usuarios').dataTable({
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
@stop