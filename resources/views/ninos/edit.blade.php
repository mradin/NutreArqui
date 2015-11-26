@extends('app')

@section('titulo')
    <h1>Editar niño</h1>
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

    {!! Form::model($nino, ['method' => 'PATCH', 'action' =>  ['NinosController@update', $nino->id_nino]] ) !!}

    <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" name="nombre" value="{{ $nino->nombre  }}" />
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos:</label>
        <input type="text" class="form-control" name="apellidos" value="{{ $nino->apellidos  }}" />
    </div>
    <div class="form-group">
        <label for="curp">CURP:</label>
        <input type="text" class="form-control" name="curp" value="{{ $nino->curp  }}" />
    </div>
    <div class="form-group">
        <label for="edad">Edad:</label>
        <input type="number" class="form-control" name="edad" value="{{ $nino->edad  }}" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Editar</button>&nbsp;&nbsp;
    </div>


    {!! Form::close() !!}

@stop

@section('scripts')
    <script>
        $("#li-ninos").addClass('active');
    </script>
@stop