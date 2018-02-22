<?php

namespace App\Http\Controllers\Catalogos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Editorial;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;

class EditorialController extends Controller
{
    private	$name  = "Editoriales";

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {

        $editorial       = $request->input('editorial');
        $representante = $request->input('representante');
        $no = $request->input('no');

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

        Editorial::create([
            'editorial' => strtoupper($editorial),
            'representante' => $representante,
            'no' => $no,
        ]);

        return redirect('index/'.$cat_id);

    }

    public function update(Request $request)
    {

        $editorial       = $request->input('editorial');
        $representante = $request->input('representante');
        $no = $request->input('no');

        $cat_id     = $request->input('cat_id');
        $idItem     = $request->input('idItem');
        $action     = $request->input('action');

        $validator = Validator::make($request->all(), [
            'editorial' => "required|unique:editoriales,editorial,$idItem|max:100",
            'representante' => "max:150",
        ]);

        if ($validator->fails()) {
            return redirect('catalogos/'.$cat_id.'/'.$idItem.'/'.$action)
                ->withErrors($validator)
                ->withInput();
        }

        $Editorial = Editorial::findOrFail($idItem);
        $Editorial->editorial = strtoupper($editorial);
        $Editorial->representante = $representante;
        $Editorial->no = $no;
        $Editorial->save();

        //$edito->update($validator)
        return redirect('index/'.$cat_id);
    }

    public function destroy($id=0,$idItem=0,$action=0){
        Editorial::findOrFail($id)->delete();
        return Response::json(['validar_correo' => 'false', 'data' => 'OK', 'status' => '200'], 200);
    }


}
