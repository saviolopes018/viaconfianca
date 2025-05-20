@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Minha Conta</h2>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    @if (session('message-success-update'))
                        <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Sucesso</span>
                            {{ session('message-success-update') }}
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
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-1">
                                    <img class="user-avatar rounded-circle" src="{{ asset('assets/img/avatar.png') }}"
                                        alt="User Avatar">
                                </div>
                            </div>
                            <br>
                            <form action="{{ route('minha.conta.atualizar') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="id" name="id" value="{{ $user->id }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Nome</label>
                                            <input type="text" id="name" name="name" class="form-control"
                                                autocomplete="off" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">Email</label>
                                            <input type="text" id="email" name="email" class="form-control"
                                                autocomplete="off" value="{{ $user->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password" class="form-control-label">Senha</label>
                                            <input type="password" id="password" name="password" class="form-control"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="nome" class="form-control-label">Perfil</label>
                                            <input type="text" id="nome" name="nome" class="form-control"
                                                autocomplete="off" disabled value="MASTER">
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


            </div>
        </div>
    </div>
@endsection
