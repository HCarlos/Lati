<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Editorial;
use App\Models\Ficha;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CatalogosListController extends Controller
{

    public function datatable()

    {

        return view('datatable');

    }
    public function index($id = 0)
    {
        $name = "nothing";
        switch ($id) {
            case 0:
                $name  = "Carlos Hidalgo";
                $catit = "Catálogo de Editoriales";
                $tableName = 'editoriales';
                $items = Editorial::all()->sortByDesc('id');
                break;
            case 1:
                $name  = "Carlos Hidalgo";
                $catit = "Catálogo de Fichas";
                $tableName = 'fichas';
                $items = Ficha::all()->sortByDesc('id');

                $totalPaginas = $items->count();

                //dd($items);

                break;

        }

        $user = Auth::User();

        return view ('catalogos.side_bar_right',
            ['nombre' => $name,
                'items' => $items,
                'id' => $id,
                'titulo_catalogo' => $catit,
                'user' => $user,
                'tableName'=>$tableName,
            ]
        );
    }

    public function ajaxIndex($id=0){
        switch ($id) {
            case 0:
                $items = Editorial::all()->sortByDesc('id');
                break;
            case 1:
                $items = Ficha::all()->sortByDesc('id');
                break;
        }

        return Datatables::of($items)
            ->make(true);
    }

}
