<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NivelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get nivel from database
        $nivel = auth()->user()->us_nivel;
        return response()->json([
            'res'=>true,
            'nivel' => $nivel,
        ], 200); 

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

    }

    public function updateUser(Request $request)
    {

        $user = auth()->user();
        $request->validate([
            'us_nivel' => 'numeric',
        ]);
        if($request->has("us_nivel"))
        {
            $nivel = $request->us_nivel;            
        }else{
            $nivel = $user->us_nivel + 1; 
        }
        $user->us_nivel = $nivel;
        $user->save();
        return response()->json([
            'res'=>true,
        ], 204);
    }

    public function addNivel()
    {
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
    }
}
