<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Funciones\FuncionesController;
use App\Models\Codigo_Lenguaje_Pais;
use App\Models\Editorial;
use App\Models\Ficha;
use App\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Yajra\DataTables\DataTables;

class CatalogosListController extends Controller
{
    protected $tableName = '';
    protected $itemPorPagina = 100;

    protected $redirectTo = '/home';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatable()
    {
        return view('datatable');
    }

    public function index($id = 0, $npage = 1, $tpaginas = 0)
    {

        $page = Input::get('p');
        if ( $page != 0 ){
            $npage = $page;
        }

//        $npage = Input::get('page');


        switch ($id) {
            case 0:
                $this->tableName = 'editoriales';
                $items = Editorial::select('id','editorial','representante','predeterminado')
                    ->orderBy('id','desc')
                    ->get()
                    ->forPage($npage,$this->itemPorPagina);
                $tpaginator = Editorial::paginate($this->itemPorPagina,['*'],'p');
                break;
            case 1:
                $this->tableName = 'fichas';
                $items = Ficha::select('id','ficha_no','isbn','titulo', 'autor')
                    ->orderBy('id','desc')
                    ->get()
                    ->forPage($npage,$this->itemPorPagina);
                $tpaginator = Ficha::paginate($this->itemPorPagina,['*'],'p');
                break;
            case 2:
                $this->tableName = 'codigo_lenguaje_paises';
                $items = Codigo_Lenguaje_Pais::select('id','idmig','codigo','lenguaje', 'tipo')
                    ->orderBy('id','desc')
                    ->get()
                    ->forPage($npage,$this->itemPorPagina);
                $tpaginator = Codigo_Lenguaje_Pais::paginate($this->itemPorPagina,['*'],'p');
                break;
            case 10:
                if ( Auth::user()->isAdmin() || Auth::user()->hasRole('system_operator') ){
                    $this->tableName = 'usuarios';
                    $items = User::all()->sortByDesc('id')->forPage($npage,$this->itemPorPagina);
                    $tpaginator = User::paginate($this->itemPorPagina,['*'],'p');
                }else{
                    throw new AuthorizationException();
                }
                break;
            case 11:
                if ( Auth::user()->isAdmin() ){
                    $this->tableName = 'roles';
                    $items = Role::all()->sortByDesc('id')->forPage($npage,$this->itemPorPagina);
                    $tpaginator = Role::paginate($this->itemPorPagina,['*'],'p');
                }else{
                    throw new AuthorizationException();
                }
                break;
            case 12:
                if ( Auth::user()->isAdmin() ){
                    $this->tableName = 'permissions';
                    $items = Permission::all()->sortByDesc('id')->forPage($npage,$this->itemPorPagina);
                    $tpaginator = Permission::paginate($this->itemPorPagina,['*'],'p');
                }else{
                    throw new AuthorizationException();
                }
                break;
            default:
                throw new NotFoundHttpException();
                break;
        }
        $tpaginas = $tpaginas == 0 ? $tpaginator->lastPage() : $tpaginas;
        $user = Auth::User();
        $tpaginator->withPath("/index/$id/$npage/$tpaginas");
        //$tpaginator->appends(['sort' => 'votes'])->links();
        return view ('catalogos.side_bar_right',
            [
                'items' => $items,
                'id' => $id,
                'titulo_catalogo' => "Catálogo de ".ucwords($this->tableName),
                'user' => $user,
                'tableName'=>$this->tableName,
                'npage'=> $npage,
                'tpaginas' => $tpaginas,
            ]
        )->with("paginator" , $tpaginator);
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
                case 2:
                    //$search = $F->toMayus($search);
                    $this->tableName = 'codigo_lenguaje_paises';
                    $total = Codigo_Lenguaje_Pais::all()->count();
                    $items = Codigo_Lenguaje_Pais::select('id','idmig','codigo','lenguaje', 'tipo')
                        ->orWhere('codigo','LIKE',"%{$search}%")
                        ->orWhere('lenguaje','LIKE',"%{$search}%")
                        ->orWhere('tipo','LIKE',"%{$search}%")
                        ->get()
                        ->sortByDesc('id');
                    $items = $total == count($items) ? collect(new Ficha) : $items;
                    break;
                case 10:
                    if ( Auth::user()->isAdmin() || Auth::user()->hasRole('system_operator') ){
                        //$search = $F->toMayus($search);
                        $this->tableName = 'usuarios';
                        $total = User::all()->count();
                        $items = User::select('id','username','nombre_completo','email')
                            ->orWhere('username','LIKE',"%{$search}%")
                            ->orWhere('nombre_completo','LIKE',"%{$search}%")
                            ->orWhere('email','LIKE',"%{$search}%")
                            ->get()
                            ->sortByDesc('id');
                        $items = $total == count($items) ? collect(new User) : $items;
                    }else{
                        throw new AuthorizationException();
                    }
                    break;
                case 11:
                    if ( Auth::user()->isAdmin() ){
                        $this->tableName = 'roles';
                        $total = Role::all()->count();
                        $items = Role::select('id','name')
                            ->orWhere('name','LIKE',"%{$search}%")
                            ->get()
                            ->sortByDesc('id');
                        $items = $total == count($items) ? collect(new Role) : $items;
                    }else{
                        throw new AuthorizationException();
                    }
                    break;
                case 12:
                    if ( Auth::user()->isAdmin() ){
                        $this->tableName = 'permissions';
                        $total = Permissions::all()->count();
                        $items = Permissions::select('id','name')
                            ->orWhere('name','LIKE',"%{$search}%")
                            ->get()
                            ->sortByDesc('id');
                        $items = $total == count($items) ? collect(new Permission) : $items;
                    }else{
                        throw new AuthorizationException();
                    }
                    break;
                default:
                    throw new NotFoundHttpException();
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
                'npage'=> 1,
                'tpaginas' => 0,
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
            case 2:
                $items = Codigo_Lenguaje_Pais::select('id','idmig','codigo','lenguaje', 'tipo')
                    ->orderBy('id','desc')
                    ->get();
                break;
            case 10:
                if ( Auth::user()->isAdmin() || Auth::user()->hasRole('system_operator') ){
                    $items = User::select('id','username', 'nombre_completo','email')
                        ->orderBy('id','desc')
                        ->get();
                }else{
                    throw new AuthorizationException();
                }
                break;
            case 11:
                if ( Auth::user()->isAdmin() ){
                    $items = Role::select('id','name')
                        ->orderBy('id','desc')
                        ->get();
                }else{
                    throw new AuthorizationException();
                }
                break;
            case 12:
                if ( Auth::user()->isAdmin() ){
                    $items = Permissions::select('id','name')
                        ->orderBy('id','desc')
                        ->get();
                }else{
                    throw new AuthorizationException();
                }
                break;
            default:
                throw new NotFoundHttpException();
                break;
        }
        $dataTable = Datatables::of($items)->make(true);
        return Response::json(['data' => $items, 'dataTable'=>$dataTable, 'status' => '200'], 200);
    }

}
