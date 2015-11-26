@extends('app')

@section('titulo')
    <h1>Editar visita</h1>
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

@stop

@section('scripts')
    <script>
        $("#li-visitas").addClass('active');
    </script>
@stop