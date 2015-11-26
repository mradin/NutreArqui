@extends('app')

@stop

@section('titulo')
    <h1>Dashboard   </h1>
@stop

@section('content')

    <br>
    <div class="row">
        <!-- Users -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>3</h3>
                    <p>Usuarios</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Datasets -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>4</h3>
                    <p>Padres</p>
                </div>
                <div class="icon">
                    <i class="ion ion-ios-book"></i>
                </div>
                <a href="{{ url('padres') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Maps -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-orange">
                <div class="inner">
                    <h3>6</h3>
                    <p>Niños</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-person"></i>
                </div>
                <a href="{{ url('ninos') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Visitas -->
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>3</h3>
                    <p>Comunidades</p>
                </div>
                <div class="icon">
                    <i class="ion ion-map"></i>
                </div>
                <a href="{{ url('comunidades') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Operating systems -->
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Sistemas operativos que visitan el sistema
                </div>
                <!----------------------------------------------------------------------------
                    PANEL BODY - Gráfica operating systems
                ----------------------------------------------------------------------------->
                <div class="panel-body" id="op_systems">

                </div>
            </div>
        </div>

        <!-- Visitors by cities -->
        <div class="col-lg-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Visitantes por ciudad
                </div>
                <!----------------------------------------------------------------------------
                    PANEL BODY - Gráfica cities
                ----------------------------------------------------------------------------->
                <div class="panel-body" id="visitors_cities" class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Ciudad</th>
                            <th>Sesiones</th>
                            <th>% Sesión</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Ciudad de México</td>
                            <td>86</td>
                            <td>86.87%</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>(not set)</td>
                            <td>6</td>
                            <td>6.06%</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Guadalajara</td>
                            <td>3</td>
                            <td>3.03%</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Edo. de méxico</td>
                            <td>2</td>
                            <td>2.02%</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Toluca</td>
                            <td>1</td>
                            <td>1.01%</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Monterrey</td>
                            <td>1</td>
                            <td>1.01%</td>
                        </tr>
                        </tbody>
                    </table>

                    <br><br><br><br><br><br>

                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    <script>
        $("#li-dashboard").addClass('active');
    </script>

    <script src="http://code.highcharts.com/highcharts.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>


    <script src="{{ asset('public/js/dashboard/op_systems.js') }}" ></script>
@stop