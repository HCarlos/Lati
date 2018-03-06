<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Codigo_Lenguaje_Pais;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Funciones\FuncionesController;
class CodigoLenguajePaisController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];

        $validator = Validator::make($data, [
            'codigo' => "required|unique:codigo_lenguaje_paises,codigo|max:10",
            'tipo' => "required",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $F = (new FuncionesController);
        $codigo = $F->toMayus($data['codigo']);
        $lenguaje = $F->toMayus($data['lenguaje']);

        //$data['codigo'] = $codigo;
        $data['lenguaje'] = $lenguaje;
        Codigo_Lenguaje_Pais::create($data);

        return redirect('index/'.$cat_id);

    }

    public function update(Request $request, Codigo_Lenguaje_Pais $clp)
    {

        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];

        $validator = Validator::make($data, [
            'codigo' => "required|unique:codigo_lenguaje_paises,codigo,$idItem|max:10",
            'tipo' => "required",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $F = (new FuncionesController);
        $codigo = $F->toMayus($data['codigo']);
        $lenguaje = $F->toMayus($data['lenguaje']);

        //$data['codigo'] = $codigo;
        $data['lenguaje'] = $lenguaje;
        $clp->update($data);

        return redirect('index/'.$cat_id);
    }

    public function destroy($id=0,$idItem=0,$action=0){
        Codigo_Lenguaje_Pais::findOrFail($id)->delete();
        return Response::json(['validar_correo' => 'false', 'data' => 'OK', 'status' => '200'], 200);
    }

}
