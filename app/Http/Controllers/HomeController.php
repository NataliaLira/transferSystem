<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transfer;
use App\User;

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
        $sent = Transfer::where('payer', Auth::user()->id)->rightJoin('users', 'transfer.payee', '=', 'users.id')->get();
        $received = Transfer::where('payee', Auth::user()->id)->join('users', 'transfer.payee', '=', 'users.id')->get();
        return view('profile', ['name'=>$name, 'sent'=>$sent, 'received'=>$received]);
    }
    public function transferView(){
        $users = User::all();
        return view('transfers', ['users'=>$users]);
    }
}
