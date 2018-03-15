<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Funciones\FuncionesController;
use http\Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class StorageProfileController extends Controller
{
    protected $redirectTo = 'showEditProfilePhoto/';
    public function __construct(){
        $this->middleware('auth');
    }

    public function subirArchivoProfile(Request $request)
    {

        $data    = $request->all();

        try {
            $validator = Validator::make($data, [
                'photo' => "required|mimes:jpg,jpeg,gif,png|max:10000",
            ]);
            if ($validator->fails()){
                return redirect('showEditProfilePhoto/')
                    ->withErrors($validator)
                    ->withInput();

            }
            $user = Auth::User();
            $file = $request->file('photo');
            $ext = $file->extension();
            $fileName = $user->id.'.' . $ext;
            Storage::disk('profile')->put($fileName, File::get($file));
            $user->root = 'profile/';
            $user->filename = $fileName;
            $user->save();

        }catch (Exception $e){
            dd($e);
        }
        if ($user->hasRole('user') || $user->hasRole('administrator') ) {
            return redirect($this->redirectTo);
        }

    }

    public function quitarArchivoProfile(Request $request)
    {
        $user = Auth::user();
        Storage::disk('profile')->delete($user->filename);
        $user->filename = '';
        $user->root = '';
        $user->save();

        if ($user->hasRole('user') || $user->hasRole('administrator') ) {
            return redirect($this->redirectTo);
        }

    }
}
