<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultorController extends Controller
{
    public function listagem() {
        return view('consultor.listagem');
    }

    public function cadastro() {

    }
}
