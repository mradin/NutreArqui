<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">

    <title>Admin - Nutre a un Niño</title>

    <!-- Bootstrap -->
    <link href="{{ asset('public/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="{{ asset('public/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('public/css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom style -->
    <link href="{{ asset('public/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Skin -->
    <link href="{{ asset('public/css/skins/skin-green.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Extras -->
    <link href="{{ asset('public/css/admin/extras.css') }}" rel="stylesheet" type="text/css" />

    @yield('estilos')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body class="skin-green">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <a href="#" class="logo">Admin - <b>Nutre</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">
                                @if(Auth::user())
                                    {{ Auth::user()->name }}
                                @endif
                            </span>
                            &nbsp;&nbsp;&nbsp;<i class="fa fa-user "></i><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <a href="{{ url('auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- ====================================================================================================== -->

    <!-- Left side column.- contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">

                    <li id="li-dashboard">
                        <a href="{{ url('dashboard') }}">
                            <i class="fa fa-book"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li id="li-usuarios">
                        <a href="{{ url('usuarios') }}">
                            <i class="fa fa-users"></i> <span>Usuarios</span>
                        </a>
                    </li>

                    <li id="li-comunidades">
                        <a href="{{ url('comunidades') }}">
                            <i class="fa fa-map-marker"></i> <span>Comunidades</span>
                        </a>
                    </li>

                    <li id="li-padres">
                        <a href="{{ url('padres') }}">
                            <i class="fa fa-bookmark"></i> <span>Padres</span>
                        </a>
                    </li>

                    <li id="li-ninos">
                        <a href="{{ url('ninos') }}">
                            <i class="fa fa-child"></i> <span>Niños</span>
                        </a>
                    </li>

                    <li id="li-visitas">
                        <a href="{{ url('visitas') }}">
                            <i class="fa fa-briefcase"></i> <span>Visitas</span>
                        </a>
                    </li>

                </ul>
            </div>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            @yield('titulo')

        </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <footer class="main-footer">
        <strong>&nbsp;Nutre a un niño 2015</strong>
    </footer>
</div><!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset('public/js/jquery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="{{ asset('public/js/jquery.slimScroll.min.js') }}" type="text/javascript"></script>
<!-- FastClick -->
<script src="{{ asset('public/js/fastclick.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/js/admin.js') }}" type="text/javascript"></script>

@yield('scripts')

</body>
</html>