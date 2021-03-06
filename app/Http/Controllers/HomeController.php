<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usr = Auth::user();
        $usr->admin = $usr->hasRole('administrator');
        $usr->save();
        return view('home');
    }

    public function index_alumno()
    {
        return view('home_alumno');
    }

}
