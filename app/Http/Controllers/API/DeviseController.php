<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Devises;
use Error;
use Illuminate\Http\Request;

class DeviseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recuperation de l'ensemble des devises et renvoi un status 200 (ok)

        $data = Devises::all();
        return response()->json(["response" => $data, "status" => 200]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:devises"
        ]);

        try {
            $devise = new Devises();
            $devise->name = $request->input('name');
            $devise->save();

            return response()->json(["message" => "devise has been created", $devise, "status" => 201], 201);
        } catch (Error $e) {
            response()->json($e, 500);
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
            'name' => 'required|unique:devises,name,' . $id,
        ]);

        $devise = Devises::findOrFail($id);

        if (!$devise) return response()->json(["error" => "devises not found", "status" => 404], 404); //si la devise n'existe pas, renvoi une erreur 404

        $devise->name = $request->input('name');
        $devise->save();

        return response()->json(["message" => "devise has been updated successfully", "reponse" => $devise, "status" => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $devise =  Devises::FindOrFail($id);
        if (!$devise) return response()->json(["error" => "devises not found", "status" => 404], 404);

        $devise->delete();

        return response()->json(["message" => "devise has been deleted successfully", "status" => 200]);
    }
}
