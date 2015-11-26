@extends('app')

@section('titulo')
    <h1>Crear padre</h1>
@stop

@section('content')

    <br>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong>  Hubo un problema.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br>
    @endif


    <div class="row">
        <div class="col-lg-6">
            <form method="post" accept-charset="UTF-8" action="{{ url('padres') }}">

                <!-- Token -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                </div>
                <div class="form-group">
                    <label for="apellidos">Apellidos:</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
                </div>
                <div class="form-group">
                    <label for="curp">CURP:</label>
                    <input type="text" class="form-control" name="curp" placeholder="CURP">
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo:</label>
                    <select name="tipo" class="form-control">
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Agregar</button>&nbsp;&nbsp;
                </div>

            </form>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $("#li-padres").addClass('active');
    </script>
@stop