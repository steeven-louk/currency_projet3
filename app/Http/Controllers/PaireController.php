<?php

namespace App\Http\Controllers;

use Error;
use App\Models\Paires;
use Illuminate\Http\Request;

class PaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperation de l'ensemble des paires et renvoi un status 200 (ok)
        $data = Paires::all();
        return response()->json([
            "response" => $data,
            "status" => 200
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "devise_1" => "required|max:3",
            "devise_2" => "required|max:3",
            "taux" => "required|integer",
        ]);

        try {
            $paire = new Paires();
            $paire->devise_1 = $request->input('devise_1');
            $paire->devise_2 = $request->input('devise_2');
            $paire->taux = $request->input('taux');

            $paire->save(); //on sauvegarde la nouvelle paire

            return response()->json(["message" => "paire has added", "reponse" => $paire, "status" => 201], 201);
        } catch (Error $e) {
            return response()->json($e, 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "devise_1" => "required|max:3",
            "devise_2" => "required|max:3",
            "taux" => "required|integer",
        ]);


        $paire = Paires::findOrFail($id); //recuperation de l'ID de la paire

        if (!$paire) return response()->json(["error" => "paire not found", "status" => 404]);

        $paire->devise_1 = $request->input('devise_1');
        $paire->devise_2 = $request->input('devise_2');
        $paire->taux = $request->input('taux');

        $paire->save();

        return response()->json(["message" => "paire has been updated", $paire, "status" => 201]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Paires::FindOrFail($id);
        if (!$data) return response()->json(["error" => "paires not found", "status" => 404]); //renvoi une erreur 404(not found) si la paire n'existe pas
        $data->delete();
        return response()->json(["message" => "paires deleted successfully", "status" => 200]);
    }
}
