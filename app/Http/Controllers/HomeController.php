<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transfer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profileView(){
        $name = Auth::user()->name;
        $sent = Transfer::where('from', Auth::user()->id)->get();
        $received = Transfer::where('from',Auth::user()->id)
        ->get();
        return view('profile', ['name'=>$name, 'sent'=>$sent, 'received'=>$received]);
    }
    public function transferView(){
        return view('transfers');
    }
}
