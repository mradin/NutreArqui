@extends('app')

@section('titulo')
    <h1>Crear niño</h1>
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
            <form method="post" accept-charset="UTF-8" action="{{ url('ninos') }}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
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
                    {!! Form::label('fec_nac', 'Fecha de nacimiento:') !!}
                    {!! Form::input('date', 'fec_nac', date('Y-m-d'), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="number" class="form-control" name="edad" placeholder="Edad">
                </div>
                <div class="form-group">
                    {!! Form::label('padre_id', 'Padre:') !!}
                    {!! Form::select('padre_id', $padres, null,  ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('comunidad_id', 'Comunidad:') !!}
                    {!! Form::select('comunidad_id', $comunidades, null,  ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Crear</button>
                </div>
            </form>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("#li-ninos").addClass('active');
    </script>
@stop