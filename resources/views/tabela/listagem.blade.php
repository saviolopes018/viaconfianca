@extends('components.app')

@section('content')
    <div class="col-md-12">
        <h2 class="pb-2 display-5">Tabelas</h2>
    </div>

    <div class="col-md-12">
        <div class="d-flex justify-content-end">
            <a href="{{ route('tabela.cadastro') }}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Adicionar</a>
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
                            <table id="bootstrap-data-table-export" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tabela</th>
                                        <th>Banco</th>
                                        <th>Status</th>
                                        <th>Margem de Corte</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabelas as $tabela)
                                        <tr>
                                            <td>{{ $tabela->descricao }}</td>
                                            <td>{{ $tabela->bancoDescricao }}</td>
                                            <td><span
                                                    class="badge badge-success">{{ \App\Models\Utils::getLabelAtivoPorCodigo($tabela->status) }}
                                            </td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-warning btn-sm m-l-10 m-b-10 btn-ver-corte"
                                                    title="Ver margem de corte" data-id="{{ $tabela->id }}"
                                                    id="btn-ver-corte">
                                                    <i class="fa fa-eye"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalCortes" tabindex="-1" role="dialog" aria-labelledby="modalCortesLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCortesLabel">Margem de Cortes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {

            $('.btn-ver-corte').on('click', function() {
                const modalCortes = new bootstrap.Modal($('#modalCortes')[0]);
                const botao = document.getElementById('btn-ver-corte'); // Or use querySelector, etc.
                const dataIdValue = botao.getAttribute('data-id');

                const $table = $(`
                    <table class="table table-sm tableListProdutos">
                    <thead>
                        <tr><th>Comissão</th><th>Valor Minimo</th><th>Valor Máximo</th></tr>
                    </thead>
                    <tbody></tbody>
                    </table>
                `);

                 const $preview = $('#modalCortes .modal-body').empty();

                $.ajax({
                    url: "/tabela/corte-comissao/" + dataIdValue,
                    method: 'GET',
                    success: function(data) {
                        $.each(data, function(i, corte) {
                            console.log(corte);

                            $table.find('tbody').append(`
                            <tr>
                                <td>${corte.comissao}%</td>
                                <td>${corte.valorMinimo}</td>
                                <td>${corte.valorMaximo}</td>
                            </tr>
                            `);

                        });
                        $preview.append($table);
                    }
                });

                modalCortes.show();

            });

        });
    </script>
@endpush
