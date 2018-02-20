<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Spatie\Permission\Models\Role;
//use App\Role;
use Spatie\Permission\Models\Permission;

class CatalogosListController extends Controller
{
    public function index($id = 0)
    {
        $name = "nothing";
        switch ($id) {
            case 0:
                $name  = "Carlos Hidalgo";
                $catit = "Catálogo de Editoriales";
                // $items = DB::table('users')->get();
                //$items = User::with('roles.permissions')->get();
                $items = DB::table('editoriales')
                    ->orderBy('id','desc')
                    ->get();
                //dd($items);

                break;
                /*
            case 2:
                $name  = "Tasas";
                $catit = "Catálogo de Porcentajes";
                $items = DB::table('tasas')
                    ->orderBy('id','desc')
                    ->get();
                break;
            case 3:
                $name  = "Lugares";
                $catit = "Catálogo de Lugares";
                $items = DB::table('lugares')
                    ->orderBy('id','desc')
                    ->get();
                break;
            case 4:
                $name  = "Roles";
                $catit = "Catálogo de Roles";
                $items = DB::table('roles')->get();
                break;
            case 5:
                $name  = "Permisos";
                $catit = "Catálogo de Permisos";
                $items = DB::table('permissions')->get();
                break;
            case 6:
                $name  = "Reloes y Permisos";
                $catit = "Asociación de Roles y Permisos";
                $items = DB::table('role_has_permissions as rp')
                    ->select('rp.role_id','r.name as role','rp.permission_id','p.name as permission','p.guard_name')
                    ->leftJoin('roles as r', 'rp.role_id', '=', 'r.id')
                    ->leftJoin('permissions as p', 'rp.permission_id', '=', 'p.id')
                    ->get();

                break;
            case 7:
                $name  = "Usuarios, Reloes y Permisos";
                $catit = "Asociación de Usuarios, Roles y Permisos";
                // $items = User::with('roles.permissions')->get();

                $items = DB::table('role_user as ru')
                    ->select('u.id','u.name','u.email','r.name as role','p.name as permission')
                    ->leftJoin('users as u', 'u.id', '=', 'ru.user_id')
                    ->leftJoin('role_has_permissions as rp', 'ru.role_id', '=', 'rp.role_id')
                    ->leftJoin('roles as r', 'r.id', '=', 'rp.role_id')
                    ->leftJoin('permissions as p', 'p.id', '=', 'rp.permission_id')
                    ->get();

                // dd($items);

                break;
                */
        }

        // $users = User::with('roles.permissions')->get();
        $user = Auth::User();
        // Auth::user()->hasRole('admin');
        //dd( $user->hasAnyRole( Role::all() ) );

       // dd($items);

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
