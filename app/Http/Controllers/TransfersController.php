<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transfer;

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
        $url = 'https://run.mocky.io/v3/8fafdd68-a090-496f-8c9a-3442cf30dae6';
        $contentArray = json_decode(file_get_contents($url));
        if($contentArray->message === 'Autorizado'){
            $transfer = Transfer::create([
                'value'=>$request->value,
                'from'=>$request->from,
                'to'=>$request->to
            ]);
            $transfer->save();
            return response()->json($transfer, 201);
        } else {
            return response()->json(null, 403);
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
