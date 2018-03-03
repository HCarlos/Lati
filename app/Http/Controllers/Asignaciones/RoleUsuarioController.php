<?php

namespace App\Http\Controllers\Asignaciones;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function asignar($idUser, $nameRoles,$cat_id)
    {
        $user = User::findOrFail($idUser);
        $roles = explode(',',$nameRoles);
        foreach($roles AS $i=>$valor) {
            $role = Role::where('name', $roles[$i])->first();
            $user->roles()->attach($role);
        }
        return redirect('index/'.$cat_id);
    }

    public function desasignar($idUser, $nameRoles,$cat_id)
    {
        $user = User::findOrFail($idUser);
        $roles = explode(',',$nameRoles);
        foreach($roles AS $i=>$valor) {
            $role = Role::where('name', $roles[$i])->first();
            $user->roles()->remove($role);
        }
        return redirect('index/'.$cat_id);
    }

}
