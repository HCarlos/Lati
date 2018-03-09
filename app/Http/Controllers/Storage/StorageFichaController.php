<?php

namespace App\Http\Controllers\Storage;

use App\Models\Ficha;
use App\Models\Fichafile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Exception;

class StorageFichaController extends Controller
{

    public function subirArchivoFicha(Request $request, Ficha $oFicha)
    {
//        $fl = $request->file('file');
//        $mime = $fl->getClientSize();
//        dd($mime);

        $data    = $request->all();
        $action  = $data['action'];
        $cat_id  = $data['cat_id'];
        $idItem  = $data['idItem'];
        $isbn    = trim($oFicha['isbn']);


        $validator = Validator::make($data, [
            'file' => "required|mimes:jpg,jpeg,gif,png,video/mp4,pdf,zip,rar,xz|max:20000",
        ]);

        if ($validator->fails()) {

            return redirect("catalogos/subir-imagen-ficha/$cat_id/$idItem/$action")
                ->withErrors($validator)
                ->withInput();

        }

        try {
            $file = $request->file('file');
            $ff = Fichafile::all()->where('isbn',$isbn)->last();
            $num = $ff === null ? 1 : $ff->num + 1;

            $ext = $file->extension();
            $fileName = $isbn.'_'.$num.'.'.$ext;
//            if (!Storage::disk('isbn')->exists($fileName)){
                Storage::disk('isbn')->put($fileName, File::get($file));
                Fichafile::create([
                    'ficha_id'=>$idItem,
                    'isbn'=>$isbn,
                    'filename'=>$fileName,
                    'root'=>'isbn/',
                    'num'=>$num,]);
//            }else{
//                Storage::disk('isbn')->put($fileName, File::get($file));
//            }

        }catch (Exception $e){
            dd($e);
        }

        $items = Ficha::findOrFail($idItem);
        $user = Auth::User();
        $filename = Fichafile::all()->where('isbn',$items->isbn)->sortBy('id');

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
        $filename = Fichafile::all()->where('isbn',$items->isbn)->sortBy('id');

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
