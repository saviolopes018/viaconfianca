@extends('components.app')

@section('content')
<div class="col-md-12">
    <h2 class="pb-2 display-5">Meus promotores</h2>
</div>

<div class="col-md-12">
    <div class="d-flex justify-content-end">
        <a href="{{ route('promotor.cadastro')}}" class="btn btn-primary"><i class="fa fa-plus"></i>&nbsp; Adicionar</a>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                @if (session('message-success-cadastro-promotor'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Sucesso</span>
                        {{ session('message-success-cadastro-promotor') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Listagem de todos os promotores</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Ativo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promotores as $promotor)
                                    <tr>
                                        <td>{{ $promotor->nome }}</td>
                                        <td>{{ $promotor->email }}</td>
                                        <td>{{ $promotor->status }}</td>
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
