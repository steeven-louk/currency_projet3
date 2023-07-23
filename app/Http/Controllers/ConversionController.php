<?php

namespace App\Http\Controllers;

use App\Models\Paires;
use Error;
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
       try {
        $devise = Paires::where('devise_1',$devise_1)->where('devise_2',$devise_2)->first();
        
        if(!$devise) return response()->json(['error'=>"Paires de devise non trouvee"], 404);
        
        
        $result = $amount * $devise->taux;
        $devise->increment('conversionNumber');

        $data = [
            'devise_1' => $devise_1,
            'devise_2' => $devise_2,
            "price"=> $amount,
            "amount"=> $result,
            'devises' => $devise
   ] ;
        return response()->json(
        [
            'response'=> $data,
            'status'=> 200
            
        ],200);
       } catch (Error $e) {
        response()->json($e,500);
       }
    
    }



    /**
     * Display the specified resource.
     *
     * @param  $getConversionCount
     * @return \Illuminate\Http\Response
     */
    public function getConversionCount($devise_1, $devise_2)
    {
        try {
            {
                $devises = Paires::where('devise_1', $devise_1)->where('devise_2', $devise_2)->first();

                if ($devises) {
                    return response()->json([
                        'devise_1' => $devise_1,
                        'devise_2' => $devise_2,
                        'requestCount' => $devises->conversionNumber,
                    ]);
                } else {
                    return response()->json([
                        'message' => 'La paire de devises n\'existe pas.',
                    ], 404); // Code HTTP 404 pour "Not Found" (introuvable)
                }
            }
        } catch (Error $e) {
            response()->json($e, 500);
        }
    }

  
}
