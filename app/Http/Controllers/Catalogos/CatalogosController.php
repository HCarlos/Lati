<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Editorial;
use App\Models\Ficha;
use App\User;
use Illuminate\Support\Facades\Auth;


class CatalogosController extends Controller
{
    public function index($id=0,$idItem=0,$action=0)
    {
        $tables = ['editoriales','fichas','2','3','4','5','6','7','8','9','users'];
        if ($action == 0){
            $views  = ['editorial_new','ficha_new','2','3','4','5','6','7','8','9','usuario_new'];
        }else{
            $views  = ['editorial_edit','ficha_edit','2','3','4','5','6','7','8','9','usuario_edit'];
        }

        if ($action == 1) {
            switch ($id) {
                case 0;
                    $items = Editorial::findOrFail($idItem);
                    break;
                case 1;
                    $items = Ficha::findOrFail($idItem);
                    break;
                case 10;
                    $items = User::findOrFail($idItem);
                    break;
            }
        }elseif ($action == 0){
            $items = [];
        }

        $user = Auth::User();
        //dd($items);
        $oView = 'catalogos.' ;
        //dd($id);

        return view ($oView.$views[$id],
            [
                'id'   => $id,
                'idItem' => $idItem,
                'titulo' => $tables[$id],
                'action' => $action,
                'items' => $items,
                'user' => $user
            ]
        );


    }}
