@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Parametrização</h2>
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
        @if (session('message-success-parametrizacao'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                <span class="badge badge-pill badge-success">Sucesso</span>
                {{ session('message-success-parametrizacao') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-body card-block">
                <form action="{{ route('parametrizacao.inserir') }}" method="post" class="">
                    @csrf
                    <input type="hidden" value="{{ $parametrizacao->id }}" name="id" id="id">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="metaDia" class="form-control-label">Meta do Dia</label>
                                <input type="text" id="metaDia" name="metaDia" class="form-control" autocomplete="off" value="{{ $parametrizacao->metaDia }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mediaProducaoDiaria" class="form-control-label">Média de Produção Diária</label>
                                <input type="text" id="mediaProducaoDiaria" name="mediaProducaoDiaria"
                                    class="form-control" autocomplete="off" value="{{ $parametrizacao->mediaProducaoDiaria }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="meta" class="form-control-label">Meta</label>
                                <input type="text" id="meta" name="meta" class="form-control" autocomplete="off" value="{{ $parametrizacao->meta }}">
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
