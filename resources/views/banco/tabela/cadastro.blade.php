@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Planilhas</h2>
    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <div class="d-flex justify-content-end">
            <a href="{{ route('banco.tabela.listagem')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp; Voltar</a>
        </div>
    </div>
    <div class="col-lg-12">
        @if (session('error'))
            <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                <span class="badge badge-pill badge-danger">Erro</span>
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Cadastro de novas tabelas</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('banco.tabela.inserir') }}" method="post" class="">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nome" class="form-control-label">Nome</label>
                                <input type="text" id="nome" name="nome" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nomeTabelaBancoParceiro" class="form-control-label">Tabela Banco</label>
                                <input type="text" id="nomeTabelaBancoParceiro" name="nomeTabelaBancoParceiro" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banco_id" class="form-control-label">Banco</label>
                                <select name="banco_id" id="banco_id" class="form-control">
                                    <option value="0">Selecione</option>
                                    @foreach($bancos as $banco)
                                    <option value="{{ $banco->id }}">{{ $banco->nomeBanco }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="valorMinimo" class="form-control-label">Valor Minimo (R$)</label>
                                <input type="text" id="valorMinimo" name="valorMinimo" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="valorMaximo" class="form-control-label">Valor Máximo (R$)</label>
                                <input type="text" id="valorMaximo" name="valorMaximo" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-md m-l-10 m-b-10">
                                <i class="fa fa-send"></i> Salvar
                            </button>
                            <button type="reset" class="btn btn-warning btn-md m-l-10 m-b-10">
                                <i class="fa fa-trash"></i> Limpar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
