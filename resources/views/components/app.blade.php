<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Clinicas</title>
    <meta name="description" content="Clinicas">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/buttons.bootstrap4.min.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chosen.min.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="{{ asset('assets/img/logo.png') }}" alt="Logo"
                        width="35px" height="30px"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{ asset('assets/img/logo.png') }}"
                        alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="{{ request()->routeIs('banco.listagem') ? 'active' : '' }}">
                        <a href="{{ route('banco.listagem') }}"> <i class="menu-icon fa fa-bank"></i>Banco Origem</a>
                    </li>
                    <li class="{{ request()->routeIs('consultor.listagem') ? 'active' : '' }}">
                        <a href="{{ route('consultor.listagem') }}"> <i class="menu-icon fa fa-users"></i>Meus consultores</a>
                    </li>
                    <li class="{{ request()->routeIs('promotor.listagem') || request()->routeIs('promotor.cadastro')  ? 'active' : '' }}">
                        <a href="{{ route('promotor.listagem') }}"> <i class="menu-icon fa fa-users"></i>Meus promotores</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa-arrow-left"></i></a>
                    <div class="header-left">

                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('assets/img/avatar.png') }}"
                                alt="User Avatar" title="Olá, ">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href=""><i class="fa fa-user"></i> Minha conta</a>

                            {{-- <a class="nav-link" href="#"><i class="fa fa-bell"></i> Notificações <span
                                    class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Configurações</a> --}}

                            <a class="nav-link" href=""><i class="fa fa-power-off"></i>
                                Sair</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language"
                            aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header>

        @yield('content')

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script src="{{ asset('assets/js/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.vmap.world.js') }}"></script>
    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatables-init.js') }}"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</body>

</html>
