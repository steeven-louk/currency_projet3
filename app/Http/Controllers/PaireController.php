<?php

namespace App\Http\Controllers;

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
        //
        $data = Paires::all();
        return response()->json([
            "status"=> 200,
            "response" => $data,
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
            "devise_1"=> "required|max:3",
            "devise_2"=> "required|max:3",
            "paire"=> "required|integer",
        ]);

        $paire = new Paires();
        $paire-> devise_1 =$request->input('devise_1');
        $paire-> devise_2 =$request->input('devise_2');
        $paire-> paire =$request->input('paire');

        $paire-> save();
        
        return response()->json(["status"=>201, "message"=>"paire has added", $paire]);
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
    public function update(Request $request, $id)
    {
        //
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
        $data->delete();
        return response()->json(["message"=>"paires deleted successfully", "status"=> 204]);
    }
}
