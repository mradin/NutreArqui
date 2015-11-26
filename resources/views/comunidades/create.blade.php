@extends('app')

@section('titulo')
    <h1>Crear comunidad</h1>
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
            <form method="post" accept-charset="UTF-8" action="{{ url('comunidades') }}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre de la comunidad">
                </div>
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select name="estado" class="form-control">
                        <option value="Aguascalientes">Aguascalientes</option>
                        <option value="Baja California">Baja California</option>
                        <option value="Baja California Sur">Baja California Sur</option>
                        <option value="Campeche">Campeche</option>
                        <option value="Chiapas">Chiapas</option>
                        <option value="Chihuahua">Chihuahua</option>
                        <option value="Coahuila">Coahuila</option>
                        <option value="Colima">Colima</option>
                        <option value="Distrito Federal">Distrito Federal</option>
                        <option value="Durango">Durango</option>
                        <option value="Estado de Mexico">Estado de México</option>
                        <option value="Guanajuato">Guanajuato</option>
                        <option value="Guerrero">Guerrero</option>
                        <option value="Hidalgo">Hidalgo</option>
                        <option value="Jalisco">Jalisco</option>
                        <option value="Michoacan">Michoacán</option>
                        <option value="Morelos">Morelos</option>
                        <option value="Nayarit">Nayarit</option>
                        <option value="Nuevo Leon">Nuevo León</option>
                        <option value="Oaxaca">Oaxaca</option>
                        <option value="Puebla">Puebla</option>
                        <option value="Queretaro">Querétaro</option>
                        <option value="Quintana Roo">Quintana Roo</option>
                        <option value="San Luis Potosi">San Luis Potosí</option>
                        <option value="Sinaloa">Sinaloa</option>
                        <option value="Sonora">Sonora</option>
                        <option value="Tabasco">Tabasco</option>
                        <option value="Tamaulipas">Tamaulipas</option>
                        <option value="Tlaxcala">Tlaxcala</option>
                        <option value="Veracruz">Veracruz</option>
                        <option value="Yucatan">Yucatán</option>
                        <option value="Zacatecas">Zacatecas</option>
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
        $("#li-comunidades").addClass('active');
    </script>
@stop