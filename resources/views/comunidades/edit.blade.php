@extends('app')

@section('titulo')
    <h1>Editar comunidad</h1>
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
            {!! Form::model($comunidad, ['method' => 'PATCH', 'action' =>  ['ComunidadesController@update', $comunidad->id_comunidad]] ) !!}

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" value="{{ $comunidad->nombre  }}" />
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" class="form-control" name="estado" value="{{ $comunidad->estado  }}" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Editar</button>&nbsp;&nbsp;
            </div>


            {!! Form::close() !!}
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("#li-comunidades").addClass('active');
    </script>
@stop