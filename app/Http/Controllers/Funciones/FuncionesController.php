<?php

namespace App\Http\Controllers\Funciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FuncionesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function toMayus($str=""){
        return strtr(strtoupper($str), "áéíóúñ", "ÁÉÍÓÚÑ");
    }
}
