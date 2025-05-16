<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BancoController extends Controller
{
    public function listagem() {
        return view('banco.listagem');
    }

    public function cadastro() {
        return view('banco.cadastro');
    }
}
