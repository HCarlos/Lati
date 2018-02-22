<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Ficha;
use Illuminate\Support\Facades\Response;

class FichaController extends Controller
{
    private	$name  = "Fichas";

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

        $data["fecha_mod"] = NOW();
        Ficha::create($data);

        return redirect('index/'.$cat_id);

    }

    public function update(Request $request, Ficha $oFicha)
    {
        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];

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

         $data["fecha_mod"] = NOW();
         $oFicha->update($data);

        return redirect('index/'.$cat_id);
    }

    public function destroy($id=0,$idItem=0,$action=0){
        Ficha::findOrFail($id)->delete();
        return Response::json(['validar_correo' => 'false', 'data' => 'OK', 'status' => '200'], 200);
    }


}
