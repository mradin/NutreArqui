@extends('app')

@section('titulo')
    <h1>Crear visita</h1>
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

    <form method="post" accept-charset="UTF-8" action="{{ url('visitas') }}">

        <!-- Token -->
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </div>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('fecha', 'Fecha:') !!}
            {!! Form::input('date', 'fecha', date('Y-m-d'), ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('comunidad_id', 'Comunidad:') !!}
            {!! Form::select('comunidad_id', $comunidades, null,  ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Crear</button>
        </div>

    </form>

@stop

@section('scripts')
    <script>
        $("#li-visitas").addClass('active');
    </script>
@stop