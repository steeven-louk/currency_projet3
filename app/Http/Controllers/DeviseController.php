<?php

namespace App\Http\Controllers;

use App\Models\Devises;
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
        $data = Devises::all();
        return response()->json([ $data, "status"=>200]);
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
            "name" =>"required|unique:devises"
        ]);

        $devise = new Devises();
        $devise->name = $request->input('name');
        $devise->save();

        return response()->json(["message"=>"devise has been created",$devise, "status"=> 201]);
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

        if(!$devise) return response()->json(["error"=> "devises not found", "status"=> 404]);

        $devise->name = $request->input('name');
        $devise->save();
    
        return response()->json(["message"=>"devise has been updated successfully",$devise, "status"=>200]);
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
        if(!$devise) return response()->json(["error"=> "devises not found", "status"=> 404]);

        $devise-> delete();

        return response()->json(["message"=>"devise has been deleted successfully", "status"=>200]);

    }
}
