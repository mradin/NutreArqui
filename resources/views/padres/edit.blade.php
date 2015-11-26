@extends('app')

@section('titulo')
    <h1>Editar padre</h1>
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

    {!! Form::model($padre, ['method' => 'PATCH', 'action' =>  ['PadresController@update', $padre->id_padre]] ) !!}

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="{{ $padre->nombre  }}" />
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" name="apellidos" value="{{ $padre->apellidos  }}" />
        </div>
        <div class="form-group">
            <label for="curp">CURP:</label>
            <input type="text" class="form-control" name="curp" value="{{ $padre->curp  }}" />
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" class="form-control" name="tipo" value="{{ $padre->tipo  }}" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Editar</button>&nbsp;&nbsp;
        </div>


    {!! Form::close() !!}
@stop

@section('scripts')
    <script>
        $("#li-padres").addClass('active');
    </script>
@stop