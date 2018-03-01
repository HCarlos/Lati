<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Funciones\FuncionesController;
use App\Models\Editorial;
use App\Models\Ficha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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
                $name = "Carlos Hidalgo";
                $catit = "Catálogo de Editoriales";
                $tableName = 'editoriales';
//                $items = Editorial::all()->sortByDesc('id')->forPage(1,100);
                $items = Editorial::select('id','editorial','representante')
                    ->orderBy('id','desc')
                    ->get()
                    ->forPage(1,100);
                break;
            case 1:
                $name  = "Carlos Hidalgo";
                $catit = "Catálogo de Fichas";
                $tableName = 'fichas';
//                $items = Ficha::all()->sortByDesc('id')->forPage(1,100);
                $items = Ficha::select('id','ficha_no','isbn','titulo', 'autor')
                    ->orderBy('id','desc')
                    ->get()
                    ->forPage(1,100);
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

    public function indexSearch(Request $request)
    {
        $name = "nothing";
        $search = trim($request->input('search'));
        $id = $request->input('id');
        $F = (new FuncionesController);
        $search = $F->toMayus($search);

        switch ($id) {
            case 0:
                $name = "Carlos Hidalgo";
                $catit = "Catálogo de Editoriales";
                $tableName = 'editoriales';
                $total = Editorial::all()->count();
                if ($search !== ""){
                    $items = Editorial::select('id','editorial','representante')
                        ->orWhere('editorial','LIKE',"%{$search}%")
                        ->orWhere('representante','LIKE',"%{$search}%")
                        ->get()
                        ->sortByDesc('id');
                        //dd($items);
                }else{
                    $items = [];
                }
                break;
            case 1:
                $name  = "Carlos Hidalgo";
                $catit = "Catálogo de Fichas";
                $tableName = 'fichas';
                $total = Ficha::all()->count();
                if ($search !== ""){
                    $items = Ficha::select('id','ficha_no','isbn','titulo', 'autor')
                        ->orWhere('titulo','LIKE',"%{$search}%")
                        ->orWhere('autor','LIKE',"%{$search}%")
                        ->orWhere('isbn','LIKE',"%{$search}%")
                        ->get()
                        ->sortByDesc('id');
                }else{
                    $items = [];
                }

                break;
        }

        if ($total == count($items) ){
            $items = [];
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
                $items = Editorial::all()->sortByDesc('id',1);
                break;
            case 1:
                $items = Ficha::select('id','titulo', 'autor')
                    ->orderBy('id','desc')
                    ->get();
//                $items = Ficha::all()->sortByDesc('id')->forPage(1,100);
//                $items = Ficha::all()->forPage(1,10);
                break;
        }
        $dataTable = Datatables::of($items)->make(true);
        return Response::json(['data' => $items, 'dataTable'=>$dataTable, 'status' => '200'], 200);
    }

}
