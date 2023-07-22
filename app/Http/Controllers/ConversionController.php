<?php

namespace App\Http\Controllers;

use App\Models\conversion;
use App\Models\Paires;
use Illuminate\Http\Request;

class ConversionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($devise_1, $devise_2, $amount)
    {
        //
        $devise = Paires::where('devise_1',$devise_1)->where('devise_2',$devise_2)->first();
        $conversionPaire = conversion::find($devise->id);
        if(!$devise) return response()->json(['error'=>"Paires de devise non trouvée"], 404);
        
        if(!$conversionPaire){

            $conversion = new conversion();
            $conversion->paire_id = $devise->id;
            $conversion->save();
        }
        $conversionPaire->nombre_conversions += 1;


        $result = $amount * $devise->taux;
        $data = [
            'devise_1' => $devise_1,
            'devise_2' => $devise_2,
            "price"=> $amount,
            "amount"=> $result,
            'devises' => $devise
   ] ;
        return response()->json(
        [
            'status'=> 200,
            'response'=> $data
            
        ],200);
    
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
}
