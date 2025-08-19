@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Tabela</h2>
    </div>
    <div class="col-md-12" style="margin-bottom: 10px;">
        <div class="d-flex justify-content-end">
            <a href="{{ route('tabela.listagem') }}" class="btn btn-secondary">Voltar <i class="fa fa-arrow-left"></i></a>
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
                <form action="{{ route('tabela.inserir') }}" method="post" class="">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="descricao" class="form-control-label">Tabela</label>
                                <input type="text" id="descricao" name="descricao" class="form-control"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="banco_id" class="form-control-label">Banco</label>
                                <select name="banco_id" id="banco_id" class="form-control">
                                    <option value="0">Selecione</option>
                                    @foreach ($bancos as $banco)
                                        <option value="{{ $banco->id }}">{{ $banco->nomeBanco }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 style="margin-bottom: 10px;">Cortes de Comissão</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="valorMinimo" class="form-control-label">Valor Minimo (R$)</label>
                                <input type="text" id="valorMinimo" name="valorMinimo" class="form-control"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="valorMaximo" class="form-control-label">Valor Máximo (R$)</label>
                                <input type="text" id="valorMaximo" name="valorMaximo" class="form-control"
                                    autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="comissao" class="form-control-label">Comissão (%)</label>
                                <input type="text" id="comissao" name="comissao" class="form-control"
                                    autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary add-corte-comissao">Adicionar <i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-md-12">
                            <table id="table-cortes-comissao" class="table">
                                <thead>
                                    <tr>
                                        <th>Valor Minimo (R$)</th>
                                        <th>Valor Máximo (R$)</th>
                                        <th>Comissão (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-md m-l-10 m-b-10">
                                Salvar <i class="fa fa-send"></i>
                            </button>
                            <button type="reset" class="btn btn-warning btn-md m-l-10 m-b-10">
                                Limpar <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </div>
                    <div id="inputsHidden"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.getElementById('valorMinimo').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
            value = (value / 100).toFixed(2) + '';
            value = value.replace(".", ",");
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            e.target.value = value;
        });

        document.getElementById('valorMaximo').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é número
            value = (value / 100).toFixed(2) + '';
            value = value.replace(".", ",");
            value = value.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
            e.target.value = value;
        });

        document.addEventListener('DOMContentLoaded', () => {

            $('.add-corte-comissao').on('click', function() {

                const valorMinimo = $('#valorMinimo').val();
                const valorMaximo = $('#valorMaximo').val();
                const comissao = $('#comissao').val();

                const $itens = [];
                const $table = $('#table-cortes-comissao');

                $itens.push(valorMinimo, valorMaximo, comissao);
                $table.find('tbody').append(`
                        <tr>
                            <td>${$itens[0]}</td>
                            <td>${$itens[1]}</td>
                            <td>${$itens[2]}</td>
                        </tr>

                    `);

                 document.getElementById('inputsHidden').innerHTML += `
                    <input type="hidden" name="corte[valores][]" value="${$itens[0]} - ${$itens[1]} - ${$itens[2]}">
                    <input type="hidden" name="cortes[0][]" value="${$itens[0]}">
                    <input type="hidden" name="cortes[1][]" value="${$itens[1]}">
                    <input type="hidden" name="cortes[2][]" value="${$itens[2]}">
                `;


                $('#valorMinimo').val('');
                $('#valorMaximo').val('');
                $('#comissao').val('');
            });
        });
    </script>
@endpush
