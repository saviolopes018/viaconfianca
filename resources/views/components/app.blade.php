<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Via Confiança</title>
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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
                <a class="navbar-brand" href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/logo-branca.png') }}" alt="Logo"
                        width="40px" height="40px"></a>
                <a class="navbar-brand hidden" href="{{ route('dashboard') }}"><img src="{{ asset('assets/img/logo-branca.png') }}"
                        alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('usuario.listagem') ? 'active' : '' }}">
                        <a href="{{ route('usuario.listagem') }}"> <i class="menu-icon fa fa-users"></i>Usuários </a>
                    </li> --}}
                    <li class="menu-item-has-children dropdown
                    {{ request()->routeIs('usuario.listagem') ? 'active' : '' }}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Usuários</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-plus"></i><a href="{{ route('usuario.listagem') }}">Listagem</a></li>
                        </ul>
                    </li>
                    <li class="{{ request()->routeIs('banco.listagem') ? 'active' : '' }}">
                        <a href="{{ route('banco.listagem') }}"> <i class="menu-icon fa fa-bank"></i>Banco</a>
                    </li>
                    <li class="{{ request()->routeIs('tabela.listagem') ? 'active' : '' }}">
                        <a href="{{ route('tabela.listagem') }}"> <i class="menu-icon fa fa-table"></i>Tabelas</a>
                    </li>
                    <li class="{{ request()->routeIs('banco.importar.listagem') ? 'active' : '' }}">
                        <a href="{{ route('banco.importar.listagem') }}"> <i class="menu-icon fa fa-file-excel-o"></i>Importar</a>
                    </li>
                    <li class="{{ request()->routeIs('consultor.listagem') ? 'active' : '' }}">
                        <a href="{{ route('consultor.listagem') }}"> <i class="menu-icon fa fa-users"></i>Meus consultores</a>
                    </li>
                    <li class="{{ request()->routeIs('promotor.listagem') || request()->routeIs('promotor.cadastro')  ? 'active' : '' }}">
                        <a href="{{ route('promotor.listagem') }}"> <i class="menu-icon fa fa-users"></i>Meus promotores</a>
                    </li>
                    <li class="{{ request()->routeIs('produto.listagem') || request()->routeIs('produto.cadastro')  ? 'active' : '' }}">
                        <a href="{{ route('produto.listagem') }}"> <i class="menu-icon fa fa-cubes"></i>Produtos</a>
                    </li>
                    <li class="{{ request()->routeIs('parametrizacao') || request()->routeIs('produto.cadastro')  ? 'active' : '' }}">
                        <a href="{{ route('parametrizacao') }}"> <i class="menu-icon fa fa-gear"></i>Parametrização</a>
                    </li>
                    {{-- <li class="{{ request()->routeIs('view.excel') || request()->routeIs('view.excel')  ? 'active' : '' }}">
                        <a href="{{ route('view.excel') }}"> <i class="menu-icon fa fa-cubes"></i>Excel</a>
                    </li> --}}

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
                        {{-- <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">{{ count($notificacoes) }}</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                @if(count($notificacoes) > 1)
                                <p class="red">Você tem {{ count($notificacoes) }} notificações</p>
                                @else
                                <p class="red">Você tem {{ count($notificacoes) }} notificação</p>
                                @endif

                                @foreach($notificacoes as $notificacao)
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-minus"></i>
                                    <p>{{ $notificacao }}</p>
                                </a>

                                @endforeach

                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ asset('assets/img/avatar.png') }}"
                                alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ route('minha.conta') }}"><i class="fa fa-user"></i> Minha conta</a>

                            {{-- <a class="nav-link" href="#"><i class="fa fa-bell"></i> Notificações <span
                                    class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Configurações</a> --}}

                            <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-power-off"></i>
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
    <script src="{{ asset('assets/js/chartjs-init.js') }}"></script>
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

    <script>

    </script>

    <script>
        document.getElementById('metaDia').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
            value = (value/100).toFixed(2) + '';
            value = value.replace(".", ",");
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            e.target.value = value;
        });

        document.getElementById('mediaProducaoDiaria').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
            value = (value/100).toFixed(2) + '';
            value = value.replace(".", ",");
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            e.target.value = value;
        });

        document.getElementById('meta').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
            value = (value/100).toFixed(2) + '';
            value = value.replace(".", ",");
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            e.target.value = value;
        });
    </script>

    <script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>

</body>

</html>
