<?php

namespace App\Http\Controllers\Asignaciones;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Role;
use App\User;

class AsignacionListController extends Controller
{
    protected $tableName = '';
    protected $lstAsigns = "";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datatable()
    {
        return view('datatable');
    }

    public function index($ida = 0,$iduser = 0)
    {
        $tables = ['Roles a Usuarios'];
        switch ($ida) {
            case 0:
                $view = 'roles_usuario';
                $listEle     = Role::all()->sortByDesc('name')->pluck('name','name');
                $listTarget  = User::all()->sortByDesc('name')->pluck('name','id');
                if ($iduser == 0){
                    $iduser = 1;
                    $users       = User::findOrFail($iduser);
                }else{
                    $users       = User::findOrFail($iduser);
                }
                foreach ($users->roles as $role) {
                    $this->lstAsigns .= $role->name . ', ';
                }
                break;
        }

        // dd($ida);

        $user = Auth::User();
        return view ('asignaciones.'.$view,
            [
                'listEle' => $listEle,
                'listTarget' => $listTarget,
                'lstAsigns' => $users->roles->pluck('name','name'),
                'id' => $ida,
                'titulo' => "Asignación de ".$tables[$ida],
                'user' => $user,
                'iduser' => $iduser,
            ]
        );
    }
    //
}
