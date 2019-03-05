<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mensajes;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
      public function index()
    { 
        return view('home');
    }
     public function adminpanel()
    { 
        if(\Auth::user()->poder=="admin")
        {
             return view('admin.adminpanel');
        }
        else{
            return redirect()->route('home')
                                ->with(['error' => 'No puedes acceder a esta pagina']);
        }
       
    }
}
