<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\ConsultorController;
use App\Http\Controllers\PromotorController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UploadExcelController;
use App\Http\Controllers\TabelaController;
use App\Http\Controllers\PlanilhaController;
use App\Http\Controllers\ParametrizacaoController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Rotas para recuperação de senha (opcional)
Route::get('/password/reset', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('password.update');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/hash', [AuthController::class, 'hash'])->name('hash');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //Banco
    Route::get('/banco/listagem', [BancoController::class, 'listagem'])->name('banco.listagem');
    Route::get('/banco/cadastro', [BancoController::class, 'cadastro'])->name('banco.cadastro');
    Route::post('/banco/inserir', [BancoController::class, 'inserirBanco'])->name('banco.inserir');

    // Banco - Planilha
    Route::get('/banco/planilha/listagem', [PlanilhaController::class, 'listagem'])->name('banco.planilha.listagem');
    Route::get('/banco/planilha/cadastro', [PlanilhaController::class, 'cadastro'])->name('banco.planilha.cadastro');
    Route::post('/banco/planilha/inserir', [PlanilhaController::class, 'inserirPlanilha'])->name('banco.planilha.inserir');

    // Banco - Importar
    Route::get('/banco/importar/listagem', [PlanilhaController::class, 'listagemDados'])->name('banco.importar.listagem');
    Route::get('/banco/importar/cadastro', [PlanilhaController::class, 'uploadDados'])->name('banco.importar.cadastro');
    Route::post('/banco/importar/upload', [PlanilhaController::class, 'upload'])->name('banco.importar.upload');

    // Consultor
    Route::get('/consultor/listagem', [ConsultorController::class, 'listagem'])->name('consultor.listagem');
    Route::get('/consultor/cadastro', [ConsultorController::class, 'cadastro'])->name('consultor.cadastro');
    Route::post('/consultor/inserir', [ConsultorController::class, 'inserirConsultor'])->name('consultor.inserir');
    Route::get('/consultor/gerar-usuario/{id}', [ConsultorController::class, 'gerarUsuario'])->name('consultor.gerar.usuario');

    // Promotor
    Route::get('/promotor/listagem', [PromotorController::class, 'listagem'])->name('promotor.listagem');
    Route::get('/promotor/cadastro', [PromotorController::class, 'cadastro'])->name('promotor.cadastro');
    Route::post('/promotor/inserir', [PromotorController::class, 'inserirPromotor'])->name('promotor.inserir');

    //Produto
    Route::get('/produto/listagem', [ProdutoController::class, 'listagem'])->name('produto.listagem');
    Route::get('/produto/cadastro', [ProdutoController::class, 'cadastro'])->name('produto.cadastro');
    Route::post('/produto/inserir', [ProdutoController::class, 'inserirProduto'])->name('produto.inserir');

    //Usuario
    Route::get('/usuario/listagem', [UsuarioController::class, 'listagem'])->name('usuario.listagem');
    Route::get('/usuario/cadastro', [UsuarioController::class, 'cadastro'])->name('usuario.cadastro');
    Route::post('/usuario/inserir', [UsuarioController::class, 'inserirUsuario'])->name('usuario.inserir');
    Route::get('/usuario/reset/{id}', [UsuarioController::class, 'resetPassword'])->name('reset');
    Route::get('/usuario/minha-conta', [UsuarioController::class, 'minhaConta'])->name('minha.conta');
    Route::put('/usuario/minha-conta/atualizar', [UsuarioController::class, 'atualizarConta'])->name('minha.conta.atualizar');
    Route::get('/usuario/inativar/{id}', [UsuarioController::class, 'inativarUsuario'])->name('inativar');
    Route::get('/usuario/ativar/{id}', [UsuarioController::class, 'ativarUsuario'])->name('ativar');

    //Tabela
    Route::get('/tabela/listagem', [TabelaController::class, 'listagem'])->name('tabela.listagem');
    Route::get('/tabela/cadastro', [TabelaController::class, 'cadastro'])->name('tabela.cadastro');
    Route::post('/tabela/inserir', [TabelaController::class, 'inserirTabela'])->name('tabela.inserir');
    Route::get('/tabela/corte-comissao/{idTabela}', [TabelaController::class, 'getMargemCorte'])->name('tabela.margem.corte');

    //Parametrização
    Route::get('/parametrizacao', [ParametrizacaoController::class, 'parametrizacao'])->name('parametrizacao');
    Route::post('/parametrizacao/inserir', [ParametrizacaoController::class, 'inserir'])->name('parametrizacao.inserir');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/view', [UploadExcelController::class, 'form'])->name('view.excel');
Route::post('/excel/upload', [UploadExcelController::class, 'upload'])->name('upload.excel');
