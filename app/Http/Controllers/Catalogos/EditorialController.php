<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use App\User;
use App\Models\Editorial;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



class EditorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){
        //return view('catalogos.editorial_list');
        return "Editorial SLit";
    }
    public function store(Request $request)
    {
/*
        $tasa       = $request->input('tasa');
        $porcentaje = $request->input('porcentaje');

        $user_id    = $request->input('user_id');
        $cat_id     = $request->input('cat_id');
        $idItem     = $request->input('idItem');
        $action     = $request->input('action');


        $validator = Validator::make($request->all(), [
            'tasa'     => 'required|unique:Editorial|max:100',
            'porcentaje' => 'required|unique:Editorial|numeric|max:100',
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($user_id);
        Editorial::create(['tasa' => $tasa, 'porcentaje' => $porcentaje]);
        $items = Editorial::all()->sortByDesc('id');
        return view ('catalogo_list',
            ['nombre' => $this->name,
                'items' => $items,
                'id' => $cat_id,
                'titulo_catalogo' => 'Catálogo de '.$this->name,
                'user' => $user
            ]
        );

*/

return "Hola Store";

    }

    public function update(Request $request)
    {
/*
        $tasa       = $request->input('tasa');
        $porcentaje = $request->input('porcentaje');

        $user_id    = $request->input('user_id');
        $cat_id     = $request->input('cat_id');
        $idItem     = $request->input('idItem');
        $action     = $request->input('action');
        $user = User::find($user_id);

        $validator = Validator::make($request->all(), [
            'porcentaje' => 'unique:Editorial,porcentaje,'.$idItem,
            'tasa' => 'unique:Editorial,tasa,'.$idItem,
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $Tasa = Editorial::find($idItem);
        $Tasa->tasa = $tasa;
        $Tasa->porcentaje = $porcentaje;
        $Tasa->save();

        $items = Editorial::all()->sortByDesc('id');

        return view ('catalogo_list',
            ['nombre' => $this->name,
                'items' => $items,
                'id' => $cat_id,
                'titulo_catalogo' => 'Catálogo de '.$this->name,
                'user' => $user
            ]
        );
*/

        return "Hola Update";

    }

    public function destroy($id=0,$idItem=0,$action=0){
/*
        Editorial::find($id)->delete();
        return Response::json(['validar_correo' => 'false', 'data' => 'OK', 'status' => '200'], 200);
*/

        return "Hola Destroy";

    }


}
