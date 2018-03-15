<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\User;

class EditUserDataController extends Controller
{
   
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $redirectToError = '/edit';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    protected function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre_completo' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectToError)
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user = Auth::user();
            // $input = $request->only('nombre_completo', 'twitter', 'facebook', 'instagram');
            $input = $request->all();
            $user->nombre_completo = $request->input('nombre_completo');
            $user->twitter = $request->input('twitter');
            $user->facebook = $request->input('facebook');
            $user->instagram = $request->input('instagram');
            $user->save();
            return redirect($this->redirectTo);
        }

    }

    protected function showEditUserData(){
        $user = Auth::user();
        return view('auth.edit',compact("user"));
    }

    protected function showEditProfilePhoto(){
        $user = Auth::user();
        return view('storage.profile_photo',compact("user"));
    }



}