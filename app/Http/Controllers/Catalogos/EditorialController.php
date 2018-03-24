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

    protected $redirectTo = '/home';
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];

        $data['predeterminado'] = false;

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
        $edi = Editorial::create($data);

        return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action);
    }

    public function update(Request $request, Editorial $edi)
    {
        $data = $request->all();
        $cat_id     = $data['cat_id'];
        $idItem     = $data['idItem'];
        $action     = $data['action'];
        $pred = isset($data['predeterminado']) ? true : false;

        $validator = Validator::make($data, [
            'editorial' => "required|unique:editoriales,editorial,$idItem|max:100",
            'representante' => "max:150",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }
        $edi->deletePredeterminado();
        $F = (new FuncionesController);
        $editorial = $F->toMayus($data['editorial']);
        $representante = $F->toMayus($data['representante']);

        $data['editorial'] = $editorial;
        $data['representante'] = $representante;
        $data['predeterminado'] = $pred;

        $edi->update($data);
        return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action);

    }

    public function destroy($id=0,$idItem=0,$action=0){
        $edi = Editorial::findOrFail($id);
        if ( !$edi->isPredeterminado() ){
            $edi->delete();
            return Response::json(['mensaje' => 'Registro eliminado con éxito', 'data' => 'OK', 'status' => '200'], 200);
        }else{
            return Response::json(['mensaje' => 'No se puede eliminar el registro', 'data' => 'Error', 'status' => '200'], 200);
        }
    }


}
