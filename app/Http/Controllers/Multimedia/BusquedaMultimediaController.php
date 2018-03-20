<?php

namespace App\Http\Controllers\Multimedia;

use App\Http\Controllers\Funciones\FuncionesController;
use App\Models\Fichafile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Ficha;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\Constraint\IsEmpty;
class BusquedaMultimediaController extends Controller
{
    protected $redirectTo = '/home_alumno';

    /**
     * @param Request $request
     */
    public function busquedaMultimedia(Request $request){
        $F        = new FuncionesController();
        $data     = $request->all();
        $tsString = $F->string_to_tsQuery( strtoupper($data['searchWords']),' & ');
        // dd($tsString);

        $libros = DB::select("SELECT DISTINCT titulo, autor, isbn FROM fichas
                              WHERE to_tsvector(coalesce(titulo,'') || ' ' || 
                                    coalesce(autor,'') || ' ' || 
                                    coalesce(isbn,''))
                                    @@
                                    to_tsquery(?)",
            [$tsString]
        );

        foreach ($libros as $lib){
            $ff  = Fichafile::all()->where('isbn',$lib->isbn);
            $ficha = count($ff) > 0 ? Ficha::findOrFail($ff[0]->ficha_id) : Ficha::whereIsbn($lib->isbn)->first();
            $eti = explode('|',$ficha->etiqueta_marc);
            $lib->imagenes = $ff;
            $lib->etiquetas = $eti;
            $lib->tipo_material = $ficha->tipo_material == 1 ? 'LIBRO' : 'REVISTA';
            $lib->clasificacion = $ficha->clasificacion;
        }

        $user = Auth::User();
        return view ('multimedia.busqueda_multimedia_alumno',
            [
                'items' => $libros,
                'user' => $user,
                'stringBusqueda' => $data['searchWords'],
            ]
        );


    }

}
