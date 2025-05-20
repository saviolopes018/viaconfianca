@extends('components.app')

@section('content')
<div class="col-md-12">
    <h2 class="pb-2 display-5">Meus consultores</h2>
</div>

<div class="col-md-12">
    <div class="d-flex justify-content-end">
        <a href="{{ route('consultor.cadastro')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Adicionar</a>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @if (session('message-success-consultor'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Sucesso</span>
                        {{ session('message-success-consultor') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                @endif
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
                        <strong class="card-title">Listagem de todos os consultores</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Promotor</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($consultores as $consultor)
                                    <tr>
                                        <td>{{ $consultor->nome }}</td>
                                        <td>{{ $consultor->nomePromotor }} {{ $consultor->sobrenomePromotor }}</td>
                                        <td>{{ $consultor->email }}</td>
                                        <td>{{ \App\Models\Utils::formatarTelefone($consultor->telefone) }}</td>
                                        <td><span class="badge badge-success">{{ \App\Models\Utils::getLabelAtivoPorCodigo($consultor->status) }}</span></td>
                                        <td>
                                            <a href="{{ route('consultor.gerar.usuario', $consultor->id) }}" type="button"
                                                class="btn btn-info btn-sm m-l-10 m-b-10" title="Gerar usuário">
                                                <i class="fa fa-user"></i>
                                            </a>
                                        </td>
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
