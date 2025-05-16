@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Meus promotores</h2>
    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <div class="d-flex justify-content-end">
            <a href="{{ route('promotor.listagem')}}" class="btn btn-info"><i class="fa fa-arrow-left"></i>&nbsp; Voltar</a>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Cadastro de novos promotores</strong>
            </div>
            <div class="card-body card-block">
                <form action="" method="post" class="">
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
                                <label for="sobrenome" class="form-control-label">Sobrenome</label>
                                <input type="text" id="sobrenome" name="sobrenome" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cpf" class="form-control-label">CPF</label>
                                <input type="text" id="cpf" name="cpf" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telefone" class="form-control-label">Telefone</label>
                                <input type="text" id="telefone" name="telefone" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dataNascimento" class="form-control-label">Data de Nascimento</label>
                                <input type="date" id="dataNascimento" name="dataNascimento" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="endereco" class="form-control-label">Endereço</label>
                                <input type="text" id="endereco" name="endereco" placeholder="Ex: Avenida Pontes Vieira, 211" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="cep" class="form-control-label">CEP</label>
                                <input type="text" id="cep" name="cep" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cidade" class="form-control-label">Cidade</label>
                                <input type="text" id="cidade" name="cidade" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="estado" class="form-control-label">Estado</label>
                                <input type="text" id="estado" name="estado" placeholder="Ex: CE" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tipoChavePix" class="form-control-label">Tipo de chave pix</label>
                                <select name="tipoChavePix" id="tipoChavePix" class="form-control">
                                    <option value="0">Selecione</option>
                                    <option value="1">CPF</option>
                                    <option value="2">CNPJ</option>
                                    <option value="3">Telefone</option>
                                    <option value="4">Email</option>
                                    <option value="5">Aleatória</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="chave" class="form-control-label">Chave</label>
                                <input type="text" id="chave" name="chave" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="banco" class="form-control-label">Banco</label>
                                <input type="text" id="banco" name="banco" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="agencia" class="form-control-label">Agência</label>
                                <input type="text" id="agencia" name="agencia" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="conta" class="form-control-label">Conta</label>
                                <input type="text" id="conta" name="conta" class="form-control" autocomplete="off">
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
