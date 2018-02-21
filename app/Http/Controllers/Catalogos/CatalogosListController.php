<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CatalogosListController extends Controller
{
    public function index($id = 0)
    {
        $name = "nothing";
        switch ($id) {
            case 0:
                $name  = "Carlos Hidalgo";
                $catit = "Catálogo de Editoriales";
                $items = DB::table('editoriales')
                    ->orderBy('id','desc')
                    ->get();
                break;

        }

        $user = Auth::User();

        return view ('catalogos.side_bar_right',
            ['nombre' => $name,
                'items' => $items,
                'id' => $id,
                'titulo_catalogo' => $catit,
                'user' => $user
            ]
        );
    }
}
