<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use App\Models\Codigo_Lenguaje_Pais;
use App\Models\Editorial;
use App\Models\Ficha;
use App\Models\Fichafile;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;


class CatalogosController extends Controller
{
    protected $otrosDatos;

    public function index($id=0,$idItem=0,$action=0)
    {
        $tables = ['editoriales','fichas','codigo_lenguaje_paises','3','4','5','6','7','8','9','users','roles','permissions'];
        if ($action == 0){
            $views  = ['editorial_new','ficha_new','clp_new','3','4','5','6','7','8','9','usuario_new','role_new','permission_new'];
        }else{
            $views  = ['editorial_edit','ficha_edit','clp_edit','3','4','5','6','7','8','9','usuario_edit','role_edit','permission_edit'];
        }

        if ($action == 1) {
            switch ($id) {
                case 0;
                    $items = Editorial::findOrFail($idItem);
                    break;
                case 1;
                    $items = Ficha::findOrFail($idItem);
                    break;
                case 2;
                    $items = Codigo_Lenguaje_Pais::findOrFail($idItem);
                    break;
                case 10;
                    $items = User::findOrFail($idItem);
                    foreach ($items->roles as $role) {
                        $this->otrosDatos .= $role->name . ', ';
                    }
                    break;
                case 11;
                    $items = Role::findOrFail($idItem);
                    foreach ($items->permissions as $permision) {
                        $this->otrosDatos .= $permision->name . ', ';
                    }
                    break;
                case 12;
                    $items = Permission::findOrFail($idItem);
                    break;
            }
        }elseif ($action == 0){
            $items = [];
            switch ($id) {
                case 10;
                    $this->otrosDatos = Role::all()->sortByDesc('name')->pluck('name', 'name');
                    break;
            }
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
                'user' => $user,
                'otrosDatos' => $this->otrosDatos,
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
        $filename = Fichafile::all()->where('ficha_id',$idItem)->last();

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
