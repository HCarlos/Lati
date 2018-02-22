<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Editorial;
use App\Models\Ficha;
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

        if ($action == 1) {
            switch ($id) {
                case 0;
                    $items = Editorial::findOrFail($idItem);
                    break;
                case 1;
                    $items = Ficha::findOrFail($idItem);
                    break;
            }
        }elseif ($action == 0){
            $items = [];
        }

        $user = Auth::User();

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


    }}
