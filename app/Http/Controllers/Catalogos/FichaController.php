<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Ficha;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Funciones\FuncionesController;

class FichaController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $data   = $request->all();
        $cat_id = $data['cat_id'];
        $idItem = $data['idItem'];
        $action = $data['action'];

        $validator = Validator::make($data, [
            'datos_fijos' => "required|max:100",
            'isbn' => "required|max:13",
            'titulo' => "required|max:250",
            'autor' => "required|max:250",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $F = (new FuncionesController);
        $data["fecha_mod"] = NOW();
        $data["titulo"]    = $F->toMayus($data['titulo']);
        $data["autor"]     = $F->toMayus($data['autor']);
        $data["idemp"]     = $F->getIHE(0);
        $data["ip"]        = $F->getIHE(1);
        $data["host"]      = $F->getIHE(2);
        Ficha::create($data);

//        return redirect('index/'.$cat_id);
        return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action);

    }

    public function update(Request $request, Ficha $oFicha)
    {
        $data   = $request->all();
        $cat_id = $data['cat_id'];
        $idItem = $data['idItem'];
        $action = $data['action'];

        // dd($data);

        $validator = Validator::make($data, [
            'datos_fijos' => "required|max:100",
            'isbn' => "required|max:13",
            'titulo' => "required|max:250",
            'autor' => "required|max:250",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $F = (new FuncionesController);
        $data["fecha_mod"] = NOW();
        $data["titulo"]    = $F->toMayus($data['titulo']);
        $data["autor"]     = $F->toMayus($data['autor']);
        $data["idemp"]     = $F->getIHE(0);
        $data["ip"]        = $F->getIHE(1);
        $data["host"]      = $F->getIHE(2);

        $oFicha->update($data);

//        return redirect('index/'.$cat_id);
        return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action);
    }

    public function clone(Request $request, Ficha $oFicha)
    {
        $F = (new FuncionesController);
        $data = $request->all();
        $cantidad              = $data['cantidad'];
        $cat_id                = $data['cat_id'];

        $data['ficha_no']      = $oFicha['ficha_no'];
        $data['fecha']         = $oFicha['fecha'];
        $data['fecha_mod']     = $oFicha['fecha_mod'];
        $data['datos_fijos']   = $oFicha['datos_fijos'];
        $data['etiqueta_marc'] = $oFicha['etiqueta_marc'];
        $data['tipo_material'] = $oFicha['tipo_material'];
        $data['isbn']          = $oFicha['isbn'];
        $data['titulo']        = $oFicha['titulo'];
        $data['autor']         = $oFicha['autor'];
        $data['clasificacion'] = $oFicha['clasificacion'];
        $data['status']        = $oFicha['status'];
        $data['no_coleccion']  = $oFicha['no_coleccion'];
        $data["idemp"]         = $F->getIHE(0);
        $data["ip"]            = $F->getIHE(1);
        $data["host"]          = $F->getIHE(2);

        for ($i=0;$i<$cantidad;$i++){
            Ficha::create($data);
        }

//        return redirect('index/'.$cat_id);
        return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action);
    }

    public function destroy($id=0,$idItem=0,$action=0){
        Ficha::findOrFail($id)->delete();
        return Response::json(['mensaje' => 'Registro eliminado con éxito', 'data' => 'OK', 'status' => '200'], 200);
    }


}
