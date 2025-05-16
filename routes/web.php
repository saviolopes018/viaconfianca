<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\ConsultorController;
use App\Http\Controllers\PromotorController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

//Banco
Route::get('/banco/listagem', [BancoController::class, 'listagem'])->name('banco.listagem');
Route::get('/banco/cadastro', [BancoController::class, 'cadastro'])->name('banco.cadastro');

// Consultor
Route::get('/consultor/listagem', [ConsultorController::class, 'listagem'])->name('consultor.listagem');
Route::get('/consultor/cadastro', [ConsultorController::class, 'cadastro'])->name('consultor.cadastro');

// Promotor
Route::get('/promotor/listagem', [PromotorController::class, 'listagem'])->name('promotor.listagem');
Route::get('/promotor/cadastro', [PromotorController::class, 'cadastro'])->name('promotor.cadastro');
