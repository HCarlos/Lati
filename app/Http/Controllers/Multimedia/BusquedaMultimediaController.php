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
        //dd($tsString);

        $libros = DB::select("SELECT DISTINCT isbn FROM fichas
                              WHERE to_tsvector(coalesce(titulo,'') || ' ' || 
                                    coalesce(autor,'') || ' ' || 
                                    coalesce(isbn,''))
                                    @@
                                    to_tsquery(?)",
            [$tsString]
        );

        foreach ($libros as $lib){
            $ff  = Fichafile::select('root','filename','ficha_id')->where('isbn',$lib->isbn)->get();
            //dd($ff);
            if ( $ff->count() > 0 ) {
                $ficha = Ficha::findOrFail($ff[0]->ficha_id);
            }else {
                $ficha = Ficha::whereIsbn($lib->isbn)->first();
            }
            $eti = explode('|', $ficha->etiqueta_marc);
            $lib->titulo = $ficha->titulo;
            $lib->autor = $ficha->autor;
            $lib->imagenes = $ff;
            $lib->etiquetas = $eti;
            $lib->tipo_material = $ficha->tipo_material == 1 ? 'LIBRO' : 'REVISTA';
            $lib->clasificacion = $ficha->clasificacion;
            $lib->existencia = $ficha->getExistencia();
        }

        // dd($libros);

        $user = Auth::User();
        return view ('multimedia.busqueda_multimedia_alumno',
            [
                'items' => $libros,
                'user' => $user,
                'stringBusqueda' => $data['searchWords'],
                'tsString' => $tsString,
            ]
        );


    }

}
