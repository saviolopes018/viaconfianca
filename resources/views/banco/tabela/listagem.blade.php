@extends('components.app')

@section('content')
<div class="col-md-12">
    <h2 class="pb-2 display-5">Tabelas</h2>
</div>

<div class="col-md-12">
    <div class="d-flex justify-content-end">
        <a href="{{ route('banco.tabela.cadastro')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Adicionar</a>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @if (session('message-success-cadastro-tabela'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Sucesso</span>
                        {{ session('message-success-cadastro-tabela') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Listagem de tabelas ativas</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Tabela</th>
                                    <th>Banco</th>
                                    <th>Valor Minimo</th>
                                    <th>Valor Máximo</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tabelas as $tabela)
                                    <tr>
                                        <td>{{ $tabela->nome }}</td>
                                        <td>{{ $tabela->nomeTabelaBancoParceiro }}</td>
                                        <td>{{ $tabela->bancoDescricao }}</td>
                                        <td>R$ {{ $tabela->valorMinimo }}</td>
                                        <td>R$ {{ $tabela->valorMaximo }}</td>
                                        <td><span class="badge badge-success">{{ \App\Models\Utils::getLabelAtivoPorCodigo($tabela->status) }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
