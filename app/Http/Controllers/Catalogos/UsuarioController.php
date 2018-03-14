<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Funciones\FuncionesController;
use App\User;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    use RegistersUsers;
    use Authorizable;

    protected $redirectTo = '/home';
    public function __construct(){
        $this->middleware('auth');
    }

    public function create(Request $request)
    {

        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];
        $rol        = $data['role'];

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        $role = Role::where('name', $rol)->first();
        $user->roles()->attach($role);

        return redirect('index/'.$cat_id);

    }

    public function update(Request $request, User $usr)
    {

        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];

        $validator = Validator::make($data, [
            'nombre_completo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }
        $F = new FuncionesController();
        $usr->nombre_completo = $F->toMayus($data['nombre_completo']);
        $usr->twitter = $data['twitter'];
        $usr->facebook = $data['facebook'];
        $usr->instagram = $data['instagram'];
        $usr->admin = $usr->hasRole('administrator');
        $usr->save();

        return redirect('index/'.$cat_id);
    }

    public function destroy($id=0,$idItem=0,$action=0)
    {
        DB::table('users')->where('id',$id)->delete();
        return Response::json(['mensaje' => 'Registro eliminado con éxito', 'data' => 'OK', 'status' => '200'], 200);
    }

}
