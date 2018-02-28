<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Editorial;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Funciones\FuncionesController;

class EditorialController extends Controller
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
            'editorial' => "required|unique:editoriales,editorial|max:100",
            'representante' => "max:150",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $F = (new FuncionesController);
        $editorial = $F->toMayus($data['editorial']);
        $representante = $F->toMayus($data['representante']);

        $data['editorial'] = $editorial;
        $data['representante'] = $representante;
        Editorial::create($data);

        return redirect('index/'.$cat_id);

    }

    public function update(Request $request, Editorial $edi)
    {

        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];

        $validator = Validator::make($data, [
            'editorial' => "required|unique:editoriales,editorial,$idItem|max:100",
            'representante' => "max:150",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $F = (new FuncionesController);
        $editorial = $F->toMayus($data['editorial']);
        $representante = $F->toMayus($data['representante']);

        $data['editorial'] = $editorial;
        $data['representante'] = $representante;
        $edi->update($data);

        return redirect('index/'.$cat_id);
    }

    public function destroy($id=0,$idItem=0,$action=0){
        Editorial::findOrFail($id)->delete();
        return Response::json(['validar_correo' => 'false', 'data' => 'OK', 'status' => '200'], 200);
    }


}
