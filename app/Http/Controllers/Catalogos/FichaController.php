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

//        $ficha_no      = $request->input('ficha_no');
        $fecha         = $request->input('fecha');
        $fecha_mod     = NOW();
        $datos_fijos   = $request->input('datos_fijos');
        $etiqueta_marc = $request->input('etiqueta_marc');
        $tipo_material = $request->input('tipo_material');
        $isbn          = $request->input('isbn');
        $titulo        = $request->input('titulo');
        $autor         = $request->input('autor');
        $clasificacion = $request->input('clasificacion');
        $status        = $request->input('status');
        $no_coleccion  = $request->input('no_coleccion');

        $cat_id     = $request->input('cat_id');
        $idItem     = $request->input('idItem');
        $action     = $request->input('action');

        $validator = Validator::make($request->all(), [
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

        Ficha::create([
//            'ficha_no' => $ficha_no,
            'fecha' => $fecha,
            'fecha_mod' => $fecha_mod,
            'datos_fijos' => $datos_fijos,
            'etiqueta_marc' => strtoupper($etiqueta_marc),
            'tipo_material' => $tipo_material,
            'isbn' => strtoupper($isbn),
            'titulo' => strtoupper($titulo),
            'autor' => strtoupper($autor),
            'clasificacion' => strtoupper($clasificacion),
            'status' => strtoupper($status),
            'no_coleccion' => $no_coleccion,
        ]);

        return redirect('index/'.$cat_id);

    }

    public function update(Request $request)
    {

//        $ficha_no      = $request->input('ficha_no');
        $fecha         = $request->input('fecha');
        $fecha_mod     = NOW();
        $datos_fijos   = $request->input('datos_fijos');
        $etiqueta_marc = $request->input('etiqueta_marc');
        $tipo_material = $request->input('tipo_material');
        $isbn          = $request->input('isbn');
        $titulo        = $request->input('titulo');
        $autor         = $request->input('autor');
        $clasificacion = $request->input('clasificacion');
        $status        = $request->input('status');
        $no_coleccion  = $request->input('no_coleccion');

        $cat_id     = $request->input('cat_id');
        $idItem     = $request->input('idItem');
        $action     = $request->input('action');

        $validator = Validator::make($request->all(), [
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

        $ficha = Ficha::findOrFail($idItem);
//        $ficha->ficha_no = $ficha_no;
        $ficha->fecha = $fecha;
        $ficha->fecha_mod = $fecha_mod;
        $ficha->datos_fijos = $datos_fijos;
        $ficha->etiqueta_marc = strtoupper($etiqueta_marc);
        $ficha->tipo_material = $tipo_material;
        $ficha->isbn = strtoupper($isbn);
        $ficha->titulo = strtoupper($titulo);
        $ficha->autor = strtoupper($autor);
        $ficha->clasificacion = strtoupper($clasificacion);
        $ficha->status = strtoupper($status);
        $ficha->no_coleccion = $no_coleccion;
        $ficha->save();

        return redirect('index/'.$cat_id);
    }

    public function destroy($id=0,$idItem=0,$action=0){
        Ficha::findOrFail($id)->delete();
        return Response::json(['validar_correo' => 'false', 'data' => 'OK', 'status' => '200'], 200);
    }


}
