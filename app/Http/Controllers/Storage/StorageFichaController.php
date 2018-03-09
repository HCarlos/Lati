<?php

namespace App\Http\Controllers\Storage;

use App\Models\Ficha;
use App\Models\Fichafile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Exception;

class StorageFichaController extends Controller
{

    public function subirArchivoFicha(Request $request, Ficha $oFicha)
    {
        $data    = $request->all();
        $action  = $data['action'];
        $cat_id  = $data['cat_id'];
        $idItem  = $data['idItem'];
        $isbn    = $oFicha['isbn'];

        try {
            $file = $request->file('file');
            $ff = Fichafile::all()->where('isbn',$isbn)->last();
            $num = $ff->num + 1;
            $ext = $file->extension();
            $fileName = $isbn.'_'.$num.'.'.$ext;
            if (!Storage::disk('isbn')->exists($fileName)){
                Storage::disk('isbn')->put($fileName, File::get($file));
                Fichafile::create([
                    'ficha_id'=>$idItem,
                    'isbn'=>$isbn,
                    'filename'=>$fileName,
                    'root'=>'isbn/',
                    'num'=>$num,]);
            }else{
                Storage::disk('isbn')->put($fileName, File::get($file));
            }

        }catch (Exception $e){
            dd($e);
        }

        $items = Ficha::findOrFail($idItem);
        $user = Auth::User();
        $filename = Fichafile::all()->where('ficha_id',$idItem)->sortBy('id');

        return view ('storage.catalogos_subir_imagen_ficha',
            [
                'id'   => $cat_id,
                'idItem' => $idItem,
                'titulo' => 'Subir imagen a ficha: ',
                'action' => $action,
                'items' => $items,
                'user' => $user,
                'otrosDatos' => '',
                'archivo' => $filename,
            ]
        );
    }

    public function quitarArchivoFicha($cat_id=0,$idItem=0,$action=0,$idFF=0)
    {
        $oFF = Fichafile::findOrFail($idFF);
//        Storage::delete('storage/'.$oFF->root.$oFF->filename);
        Storage::disk('isbn')->delete($oFF->filename);
        Fichafile::findOrFail($idFF)->delete();
        $items = Ficha::findOrFail($idItem);
        $user = Auth::User();
        $filename = Fichafile::all()->where('ficha_id',$idItem)->sortBy('id');

        return view ('storage.catalogos_subir_imagen_ficha',
            [
                'id'   => $cat_id,
                'idItem' => $idItem,
                'titulo' => 'Subir imagen a ficha: ',
                'action' => $action,
                'items' => $items,
                'user' => $user,
                'otrosDatos' => '',
                'archivo' => $filename,
            ]
        );

    }

}
