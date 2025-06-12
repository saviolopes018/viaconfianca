@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Planilhas</h2>
    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <div class="d-flex justify-content-end">
            <a href="{{ route('banco.importar.listagem')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp; Voltar</a>
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
                <strong class="card-title">Cadastro de novas planilhas</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{ route('banco.importar.upload') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="colunaPlanilha" class="form-control-label">Colunas da Planilha</label><br>
                                <input type="file" name="file">
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
