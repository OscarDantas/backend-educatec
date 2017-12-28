<?php

namespace App\Http\Controllers;


use App\Models\Lei;
use App\Models\Edital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditalController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(Request $request){
        //if($request->isJson()){ 
            $Edital = Edital::all();
     
            return response()->json($Edital);
        //}

        //return response()->json(['error' => 'Não autorizado'], 401, []); 
    }
 
    public function show(Request $request, $id){
        if($request->isJson()){
            $Edital = Edital::find($id);
            $Edital->lei;

            return response()->json($Edital);
        }

        return response()->json(['error' => 'Não autorizado'], 401, []);
    }
 
    public function create(Request $request){
        if($request->isJson()){
            $this->validate($request, [
                'id_lei' => 'required', 
                'ds_titulo' => 'required', 
                'dt_edital' => 'required', 
                'st_edital' => 'required', 
                'ds_link' => 'required', 
                'st_registro_ativo' => 'required'
            ]);
     
            $Edital = Edital::create($request->all());
     
            return response()->json($Edital);
        }

        return response()->json(['error' => 'Não autorizado'], 401, []); 
    }
  
    public function update(Request $request, $id){
        if($request->isJson()){
            $this->validate($request, [
                'id_lei' => 'required', 
                'ds_titulo' => 'required', 
                'dt_edital' => 'required', 
                'st_edital' => 'required', 
                'ds_link' => 'required', 
                'st_registro_ativo' => 'required'
            ]);

            $Edital = Edital::find($id);
            $Edital->id_lei = $request->input('id_lei');
            $Edital->ds_titulo = $request->input('ds_titulo');
            $Edital->dt_edital = $request->input('dt_edital');
            $Edital->st_edital = $request->input('st_edital');
            $Edital->ds_link = $request->input('ds_link');
            $Edital->st_registro_ativo = $request->input('st_registro_ativo');
            
            $Edital->update();

            //$Lei = Lei::find($request->input('id_lei'));
            //$Lei->editals->save($Edital);
     
            return response()->json($Edital);
        }

        return response()->json(['error' => 'Não autorizado'], 401, []);
    }  

    public function destroy(Request $request, $id){
        if($request->isJson()){
            $Edital = Edital::find($id);
            $Edital->delete();

            return response()->json('success');
        }

        return response()->json(['error' => 'Não autorizado'], 401, []);
    }
}
