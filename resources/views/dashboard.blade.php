@extends('components.app')

@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3">
    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fa fa-file bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                <div class="h5 text-primary mb-0 pt-3">2912</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Propostas pagas</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-3">
        <div class="card">
            <div class="p-0 clearfix">
                <i class="fa fa-money bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                <div class="h5 text-primary mb-0 pt-3">R$ 14.920,00</div>
                <div class="text-muted text-uppercase font-weight-bold font-xs small">Comissões pagas</div>
            </div>
        </div>
    </div>
    {{-- <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-1">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    R$ <span class="count">10468</span>
                </h4>
                <p class="text-light">Faturamento</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart1"></canvas>
                </div>

            </div>

        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-2">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Ticket Médio</p>

                <div class="chart-wrapper px-0" style="height:70px;" height="70">
                    <canvas id="widgetChart2"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-3">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Procedimentos Realizados</p>

            </div>

            <div class="chart-wrapper px-0" style="height:70px;" height="70">
                <canvas id="widgetChart3"></canvas>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="col-sm-6 col-lg-3">
        <div class="card text-white bg-flat-color-4">
            <div class="card-body pb-0">
                <h4 class="mb-0">
                    <span class="count">10468</span>
                </h4>
                <p class="text-light">Idade Média</p>

                <div class="chart-wrapper px-3" style="height:70px;" height="70">
                    <canvas id="widgetChart4"></canvas>
                </div>

            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Faturamento</div>
                        <div class="stat-digit">R$ 1.000,00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-money text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Ticket Médio</div>
                        <div class="stat-digit">R$ 1.000,00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-pin-alt text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Procedimentos Realizados</div>
                        <div class="stat-digit">770</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Idade Média</div>
                        <div class="stat-digit">38</div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

</div>
<div class="col-sm-12 mb-4">
    <div class="card-group">
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-money"></i>
                </div>

                <div class="h4 mb-0">
                    <span>R$ 28.000,00</span>
                </div>

                <small class="text-muted text-uppercase font-weight-bold">Meta do dia</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-money"></i>
                </div>
                <div class="h4 mb-0">
                    <span>R$ 28.000,00</span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Média de produção diária</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-money"></i>
                </div>
                <div class="h4 mb-0">
                    <span>R$ 28.000,00</span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Produzido</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-money"></i>
                </div>
                <div class="h4 mb-0">
                    <span>R$ 28.000,00</span>
                </div>
                <small class="text-muted text-uppercase font-weight-bold">Meta</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
        <div class="card col-md-6 no-padding ">
            <div class="card-body">
                <div class="h1 text-muted text-right mb-4">
                    <i class="fa fa-money"></i>
                </div>
                <div class="h4 mb-0">R$ 28.000,00</div>
                <small class="text-muted text-uppercase font-weight-bold">Falta para meta</small>
                <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Produção acumulada do mês</h4>
                        <canvas id="singelBarChart"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>
    </div><!-- .animated -->
</div><!-- .content --> --}}
@endsection
