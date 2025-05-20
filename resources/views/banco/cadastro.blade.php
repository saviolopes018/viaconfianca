@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Banco</h2>
    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <div class="d-flex justify-content-end">
            <a href="{{ route('banco.listagem')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp; Voltar</a>
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
                <strong class="card-title">Cadastro de novos bancos</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('banco.inserir') }}" method="post" class="">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nomeBanco" class="form-control-label">Nome</label>
                                <input type="text" id="nomeBanco" name="nomeBanco" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
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
