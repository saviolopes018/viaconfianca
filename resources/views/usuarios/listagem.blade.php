@extends('components.app')

@section('content')
<div class="col-md-12">
    <h2 class="pb-2 display-5">Usuários</h2>
</div>

<div class="col-md-12">
    <div class="d-flex justify-content-end">
        <a href="{{ route('usuario.cadastro')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Adicionar</a>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @if (session('error-resetar-senha'))
                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Erro</span>
                        {{ session('error-resetar-senha') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session('message-success-usuario'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Sucesso</span>
                        {{ session('message-success-usuario') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Listagem de todos os usuários</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Usuário</th>
                                    <th>Email</th>
                                    <th>Perfil</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->perfilDescricao }}</td>
                                        <td>
                                            @if($usuario->status == 1)
                                                <span class="badge badge-success">{{ \App\Models\Utils::getLabelAtivoPorCodigo($usuario->status) }}</span>
                                            @else
                                                <span class="badge badge-danger">{{ \App\Models\Utils::getLabelAtivoPorCodigo($usuario->status) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('reset', $usuario->id) }}" type="button"
                                                class="btn btn-warning btn-sm m-l-10 m-b-10" title="Redefinir senha">
                                                <i class="fa fa-rotate-right"></i>
                                            </a>
                                            @if($usuario->status == 1)
                                            <a href="{{ route('inativar', $usuario->id) }}" type="button"
                                                class="btn btn-danger btn-sm m-l-10 m-b-10" title="Inativar">
                                                <i class="fa fa-close"></i>
                                            </a>
                                            @else
                                            <a href="{{ route('ativar', $usuario->id) }}" type="button"
                                                class="btn btn-success btn-sm m-l-10 m-b-10" title="Ativar">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            @endif
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
