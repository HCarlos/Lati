<?php

namespace App\Http\Controllers\Funciones;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

    public function showFile($root="/storage/",$archivo=""){
        $public_path = public_path();
        $url = $public_path.$root.$archivo;
        if (Storage::exists($archivo))
        {
            return response()->download($url);
        }
        abort(404);
    }

}
