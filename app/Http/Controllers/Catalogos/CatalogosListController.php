<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Funciones\FuncionesController;
use App\Models\Editorial;
use App\Models\Ficha;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class CatalogosListController extends Controller
{
    protected $tableName = '';
    public function datatable()
    {
        return view('datatable');
    }

    public function index($id = 0)
    {
        switch ($id) {
            case 0:
                $tableName = 'editoriales';
                $items = Editorial::select('id','editorial','representante')
                    ->orderBy('id','desc')
                    ->get()
                    ->forPage(1,100);
                break;
            case 1:
                $tableName = 'fichas';
                $items = Ficha::select('id','ficha_no','isbn','titulo', 'autor')
                    ->orderBy('id','desc')
                    ->get()
                    ->forPage(1,100);
                break;
            case 10:
                $tableName = 'usuarios';
                $items = User::all()->sortByDesc('id')->forPage(1,100);
                break;
        }

        //dd($items);

        $user = Auth::User();
        return view ('catalogos.side_bar_right',
            [
                'items' => $items,
                'id' => $id,
                'titulo_catalogo' => "Catálogo de ".ucwords($tableName),
                'user' => $user,
                'tableName'=>$tableName,
            ]
        );
    }

    public function indexSearch(Request $request)
    {
        $search = trim($request->input('search'));
        $id = $request->input('id');
        $F = (new FuncionesController);
        if ($search !== ""){

            switch ($id) {
                case 0:
                    $search = $F->toMayus($search);
                    $this->tableName = 'editoriales';
                    $total = Editorial::all()->count();
                    $items = Editorial::select('id','editorial','representante')
                        ->orWhere('editorial','LIKE',"%{$search}%")
                        ->orWhere('representante','LIKE',"%{$search}%")
                        ->get()
                        ->sortByDesc('id');
                    $items = $total == count($items) ? collect(new Editorial) : $items;
                    break;
                case 1:
                    $search = $F->toMayus($search);
                    $this->tableName = 'fichas';
                    $total = Ficha::all()->count();
                    $items = Ficha::select('id','ficha_no','isbn','titulo', 'autor')
                        ->orWhere('titulo','LIKE',"%{$search}%")
                        ->orWhere('autor','LIKE',"%{$search}%")
                        ->orWhere('isbn','LIKE',"%{$search}%")
                        ->get()
                        ->sortByDesc('id');
                    $items = $total == count($items) ? collect(new Ficha) : $items;
                    break;
                case 10:
                    $this->tableName = 'usuarios';
                    $total = User::all()->count();
                    $items = User::select('id','name','nombre_completo','email')
                        ->orWhere('name','LIKE',"%{$search}%")
                        ->orWhere('nombre_completo','LIKE',"%{$search}%")
                        ->orWhere('email','LIKE',"%{$search}%")
                        ->get()
                        ->sortByDesc('id');
                    $items = $total == count($items) ? collect(new User) : $items;
                    break;
            }


        }else{
            $items = [];
        }


        $user = Auth::User();
        return view ('catalogos.side_bar_right',
            [
                'items' => $items,
                'id' => $id,
                'titulo_catalogo' => "Catálogo de ".ucwords($this->tableName),
                'user' => $user,
                'tableName'=>$this->tableName,
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
                break;
            case 10:
                $items = User::select('id','name', 'nombre_completo','email')
                    ->orderBy('id','desc')
                    ->get();
                break;
        }
        $dataTable = Datatables::of($items)->make(true);
        return Response::json(['data' => $items, 'dataTable'=>$dataTable, 'status' => '200'], 200);
    }

}
