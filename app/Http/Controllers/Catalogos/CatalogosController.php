<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class CatalogosController extends Controller
{
    public function index($id=0,$idItem=0,$action=0)
    {
        $tables = ['editoriales','fichas'];
        if ($action == 0){
            $views  = ['editorial_new','ficha_new'];
        }else{
            $views  = ['editorial_edit','ficha_edit'];
        }
        $user = Auth::User();
        if ($action == 0 or $action == 1){
            $items = DB::table($tables[$id])->whereId($idItem)->first();
            return view ('catalogos.'.$views[$id],
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
