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
    @if ($produtoFgts)
        <div class="content mt-2">
            <div class="d-flex justify-content-end">
                <div class="col-md-3">
                    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                        <span class="badge badge-pill badge-warning">Atenção</span>
                        Hoje é dia de FGTS!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($aniversariantes->count() > 0)
        <div class="content mt-2">
            <div class="d-flex justify-content-end">
                <div class="col-md-3">
                    <div class="sufee-alert alert with-close alert-warning alert-dismissible fade show">
                        <span class="badge badge-pill badge-warning">Atenção</span> Aniversariantes de Hoje 🎂<br>
                        @foreach ($aniversariantes as $user)
                            <strong>{{ $user->nome }}</strong>
                            ({{ \Carbon\Carbon::parse($user->dataNascimento)->age }} anos)<br>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="content mt-3">
            <div class="col-md-12">
                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                    <span class="badge badge-pill badge-danger">Erro</span>
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif

    <div class="content mt-3">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="p-0 clearfix">
                    <i class="fa fa-file bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-primary mb-0 pt-3">{{ $quantidadePropostasPagas }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Propostas pagas</div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="p-0 clearfix">
                    <i class="fa fa-money bg-primary p-4 font-2xl mr-3 float-left text-light"></i>
                    <div class="h5 text-primary mb-0 pt-3">R$ {{ number_format($valorComissoesPagas, 2, ',', '.') }}</div>
                    <div class="text-muted text-uppercase font-weight-bold font-xs small">Comissões pagas</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 mb-4">
        <div class="card-group">
            <div class="card col-md-6 no-padding ">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-money"></i>
                    </div>

                    <div class="h4 mb-0">
                        <span>R$ {{ $parametrizacao != null ? $parametrizacao->metaDia : 0 }}</span>
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
                        <span>R$ {{ $parametrizacao != null ? $parametrizacao->mediaProducaoDiaria : 0 }}</span>
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
                        <span>R$ {{ $parametrizacao != null ? $parametrizacao->meta : 0 }}</span>
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
