<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CatalogosController extends Controller
{
    public function index($id=0,$idItem=0,$action=0)
    {
        $tables = ['editoriales'];
        if ($action == 0){
            $views  = ['catalogos.editorial_new'];
        }else{
            $views  = ['catalogos.editorial_edit'];
        }
        $user = Auth::User();
        if ($action == 0 or $action == 1){
            $items = DB::table($tables[$id])->whereId($idItem)->first();
            return view ($views[$id],
                [
                    'id'   => $id,
                    'idItem' => $idItem,
                    'titulo' => $tables[$id],
                    'nombre' => $tables[$id],
                    'action' => $action,
                    'items' => $items,
                    'user' => $user
                ]
            );
        }

    }}
