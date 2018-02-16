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
    protected $redirectTo = '/edit';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre_completo' => 'string|max:255',
            'twitter' => 'string|max:50',
            'facebook' => 'string|max:50',
            'instagram' => 'string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectTo)
                        ->withErrors($validator)
                        ->withInput();
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nombre_completo' => 'string|max:255',
            'twitter' => 'string|max:50',
            'facebook' => 'string|max:50',
            'instagram' => 'string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect($this->redirectTo)
                        ->withErrors($validator)
                        ->withInput();
        }else{
            $user = Auth::user();        
            $user->nombre_completo = $request->input('nombre_completo');
            $user->twitter   = $request->input('twitter');
            $user->facebook  = $request->input('facebook');
            $user->instagram = $request->input('instagram');
            $user->save();     
            return redirect($this->redirectTo);   
        }

        
    }


}