<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Codigo_Lenguaje_Pais;
use App\Models\Editorial;
use App\Models\Ficha;
use App\Models\Fichafile;
use App\Models\Config;
use App\User;
use Illuminate\Auth\Access\AuthorizationException as AuthorizationException;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Carbon\Carbon;


class CatalogosController extends Controller
{
    protected $otrosDatos;
    protected $Predeterminado = false;
    protected $redirectTo = '/home';
    protected $fVencimiento = '';
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id=0,$idItem=0,$action=0)
    {
        $tables = ['editoriales','fichas','codigo_lenguaje_paises','fichas','fichas','5','6','7','8','9','users','roles','permissions'];
        if ($action == 0){
            $views  = ['editorial_new','ficha_new','clp_new','apartar_edit','devolver_edit','5','6','7','8','9','usuario_new','role_new','permission_new'];
        }else{
            $views  = ['editorial_edit','ficha_edit','clp_edit','apartar_edit','devolver_edit','5','6','7','8','9','usuario_edit','role_edit','permission_edit'];
        }

        if ($action == 1) {
            switch ($id) {
                case 0;
                    $items = Editorial::findOrFail($idItem);
                    //dd($items);
                    break;
                case 1;
                    $items = Ficha::findOrFail($idItem);
                    $this->otrosDatos = Editorial::all()->sortBy('predeterminado')->sortBy('editorial')->pluck('editorial', 'id');
                    break;
                case 2;
                    $items = Codigo_Lenguaje_Pais::findOrFail($idItem);
                    break;
                case 3;
                    $items = Ficha::findOrFail($idItem);
                    $this->otrosDatos = User::findOrFail($items->apartado_user_id);
                    $config = Config::all()->where('key','dias_apartado')->first();
                    $fa = new Carbon($items->fecha_apartado);
                    $fa = Carbon::now();
                    $fa = $fa->addDay($config->value);
                    $this->fVencimiento = $fa;
                    break;
                case 4;
                    $items = Ficha::findOrFail($idItem);
                    $this->otrosDatos = User::findOrFail($items->prestado_user_id);
                    break;
                case 10;
                    if ( Auth::user()->isAdmin() || Auth::user()->hasRole('system_operator') ){
                        $items = User::findOrFail($idItem);
                        foreach ($items->roles as $role) {
                            $this->otrosDatos .= $role->name . ', ';
                        }
                    }else{
                        throw new AuthorizationException();
                    }
                    break;
                case 11;
                    if ( Auth::user()->isAdmin() ){
                        $items = Role::findOrFail($idItem);
                        foreach ($items->permissions as $permision) {
                            $this->otrosDatos .= $permision->name . ', ';
                        }
                    }else{
                        throw new AuthorizationException();
                    }
                    break;
                case 12;
                    if ( Auth::user()->isAdmin() ){
                        $items = Permission::findOrFail($idItem);
                    }else{
                        throw new AuthorizationException();
                    }
                    break;
                default:
                    throw new NotFoundHttpException();
                    break;
            }
        }elseif ($action == 0){
            $items = [];
            switch ($id) {
                case 1;
                    $this->otrosDatos = Editorial::all()->sortBy('predeterminado')->sortBy('editorial')->pluck('editorial', 'id');
                    $pred = Editorial::select('id')->where('predeterminado',true)->first();
                    $this->Predeterminado = $pred->id;
                    break;
                case 10;
                    if ( Auth::user()->isAdmin() || Auth::user()->hasRole('system_operator') ){
                        $this->otrosDatos = Role::all()->sortByDesc('name')->pluck('name', 'name');
                    }else{
                        throw new AuthorizationException();
                    }
                    break;
                default:
                    //throw new NotFoundHttpException();
                    break;
            }
        }

        $user = Auth::User();
        //dd($items);
        $oView = 'catalogos.' ;
//        dd($items->editorial_id);

        return view ($oView.$views[$id],
            [
                'id'   => $id,
                'idItem' => $idItem,
                'titulo' => $tables[$id],
                'action' => $action,
                'items' => $items,
                'user' => $user,
                'otrosDatos' => $this->otrosDatos,
                'predeterminado' => $this->Predeterminado,
                'fVencimiento' => $this->fVencimiento,
            ]
        );

    }

    public function clone($id=0,$idItem=0,$action=0)
    {
        $items = Ficha::findOrFail($idItem);
        $user = Auth::User();

        return view ('bridge.catalogos_ficha_clone',
            [
                'id'   => $id,
                'idItem' => $idItem,
                'titulo' => 'Clonar Ficha: ',
                'action' => $action,
                'items' => $items,
                'user' => $user,
                'otrosDatos' => '',
            ]
        );

    }

    public function subirImagen($id=0,$idItem=0,$action=0)
    {
        $items = Ficha::findOrFail($idItem);
        $user = Auth::User();
        $filename = Fichafile::all()->where('isbn',$items->isbn)->sortBy('id');

        return view ('storage.catalogos_subir_imagen_ficha',
            [
                'id'   => $id,
                'idItem' => $idItem,
                'titulo' => 'Subir imagen a ficha: ',
                'action' => $action,
                'items' => $items,
                'user' => $user,
                'otrosDatos' => '',
                'archivo' => $filename,
            ]
        );

    }

}
