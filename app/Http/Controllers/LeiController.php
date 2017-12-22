<?php

namespace App\Http\Controllers;

use App\Models\Lei;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LeiController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(Request $request){
        //if($request->isJson()){
            $Lei = Lei::all();
     
            return response()->json($Lei, 200);
        //}

        //return response()->json(['error' => 'Não autorizado'], 401, []);
 
    }
 
    public function show(Request $request, $id){
        if($request->isJson()){
            $Lei = Lei::find($id);
            $Lei->Editals;
 
            return response()->json($Lei->editals(), 200);
        }

        return response()->json(['error' => 'Não autorizado'], 401, []);
    }
 
    public function create(Request $request){
        if($request->isJson()){
            $this->validate($request, [
                'ds_lei' => 'required',
                'dt_lei' => 'required',
                'st_registro_ativo' => 'required'
            ]);
 
           $Lei = Lei::create($request->all());

            return response()->json($Lei);
        }

        return response()->json(['error' => 'Não autorizado'], 401, []); 
    }
  
    public function update(Request $request, $id){
        if($request->isJson()){
            $this->validate($request, [
                'ds_lei' => 'required',
                'dt_lei' => 'required',
                'st_registro_ativo' => 'required'
            ]);

            $Lei = Lei::find($id);
            $Lei->ds_lei = $request->input('ds_lei');
            $Lei->dt_lei = $request->input('dt_lei');
            $Lei->st_registro_ativo = $request->input('st_registro_ativo');
            $Lei->save();
     
            return response()->json($Lei);
        }

        return response()->json(['error' => 'Não autorizado'], 401, []);
    }  

    public function destroy(Request $request, $id){
        if($request->isJson()){
            $Lei = Lei::find($id);
            $Lei->delete();

            return response()->json('success');
        }

        return response()->json(['error' => 'Não autorizado'], 401, []);
    }
}
