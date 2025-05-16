@extends('components.app')

@section('content')
<div class="col-md-12">
    <h2 class="pb-2 display-5">Banco Origem</h2>
</div>

<div class="col-md-12">
    <div class="d-flex justify-content-end">
        <a href="{{ route('banco.cadastro')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Adicionar</a>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Listagem de filiais ativas</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Endereço</th>
                                    <th>Empresa Matriz</th>
                                    <th>Ativo</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection
