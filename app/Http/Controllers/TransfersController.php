<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transfer;
use App\User;

class TransfersController extends Controller
{
    public function index(){
        $transfers = Transfer::all();
        return $transfers;
    }
    public function show($id) {
        return Transfer::find($id);
    }
    public function store(Request $request) {
        $payer = User::id($request->payer);
        $payee = User::id($request->payee);
        //authorization service
        $url = 'https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6';
        $contentArray = json_decode(file_get_contents($url));
        
        if($payer->wallet > $request->value){
            $error = ["error"=>"Não há saldo suficiente para a transação de dados"];
            return response()->json($error, 401);
        } 
        else if($contentArray->message === 'Autorizado'){
            $transfer = Transfer::create([
                'value'=>$request->value,
                'from'=>$request->payer,
                'to'=>$request->payee
            ]);
            $transfer->save();
            //payer wallet
            $payerWallet = $payer->wallet;
            $payer->wallet = $payerWallet - $request->value;
            $payer->save();
            //payee wallet
            $payeeWallet = $payee->wallet;
            $payee->wallet = $payeeWallet + $request->value;
            $payee->save();
            return response()->json($transfer, 201);
        } else {
            $error = ["error"=>"O serviço de autorização externa negou a transação"];
            return response()->json($error, 403);
        }
    }
    public function update(Request $request, $id) {
        $tranfer = Transfer::findOrFail($id);
        $transfer->update($request->all());
    
        return response()->json($transfer, 200);
    }
    public function delete($id) {
        Transfer::find($id)->delete();
    
        return response()->json(null, 204);
    }
}
