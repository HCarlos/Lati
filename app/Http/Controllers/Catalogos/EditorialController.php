<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Models\Editorial;
use Illuminate\Support\Facades\Response;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditorialController extends Controller
{
    private	$name  = "Editoriales";

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

        $editorial       = $request->input('editorial');
        $representante = $request->input('representante');
        $no = $request->input('no');

        $user_id    = $request->input('user_id');
        $cat_id     = $request->input('cat_id');
        $idItem     = $request->input('idItem');
        $action     = $request->input('action');


        $validator = Validator::make($request->all(), [
            'editorial' => "required|unique:editoriales,editorial|max:100",
            'representante' => "max:150",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::findOrFail($user_id);
        Editorial::create(['editorial' => $editorial, 'representante' => $representante, 'no' => $no]);
        $items = Editorial::all()->sortByDesc('id');

        /*
        return view ('catalogos.side_bar_right',
            ['editorial' => $this->name,
                'items' => $items,
                'id' => $cat_id,
                'titulo_catalogo' => 'Catálogo de '.$this->name,
                'user' => $user
            ]
        );
*/
        return redirect('index/'.$cat_id);

    }

    public function update(Request $request)
    {

        $editorial       = $request->input('editorial');
        $representante = $request->input('representante');
        $no = $request->input('no');

        $user_id    = $request->input('user_id');
        $cat_id     = $request->input('cat_id');
        $idItem     = $request->input('idItem');
        $action     = $request->input('action');
        $user = User::find($user_id);

/*
        $Editorial = Editorial::findOrFail($idItem);
        if ($Editorial->editorial ==
*/



        $validator = Validator::make($request->all(), [
            'representante' => "max:150",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }




        $Editorial = Editorial::findOrFail($idItem);
        $Editorial->editorial = $editorial;
        $Editorial->representante = $representante;
        $Editorial->no = $no;
        $Editorial->save();

/*
        $Edito = request()->all();
        $Edito->update($Edito);
*/
        $items = Editorial::all()->sortByDesc('id');
/*
        return view ('/index/'.$cat_id,
            ['editorial' => $this->name,
                'items' => $items,
                'id' => $cat_id,
                'titulo_catalogo' => 'Catálogo de '.$this->name,
                'user' => $user
            ]
        );
*/
        return redirect('index/'.$cat_id);
    }

    public function destroy($id=0,$idItem=0,$action=0){

        Editorial::findOrFail($id)->delete();
        return Response::json(['validar_correo' => 'false', 'data' => 'OK', 'status' => '200'], 200);

    }


}
