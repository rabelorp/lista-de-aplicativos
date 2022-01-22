<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response; 
use Illuminate\Database\QueryException; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

use App\Models\Profiles;
use App\Models\Transactions;
use App\Models\Evaluations;

class ProfilesController extends Controller
{
    private $model;

    public function __construct(Profiles $profiles){

        $this->model = $profiles;

    }

    public function getAll(){

        $profiles = $this->model->all();
        
        try {
            if($profiles->isEmpty()) {
                return response()->json(['status'=> 'Nenhum profile encontrado'], Response::HTTP_NOT_FOUND);
            }
            return response()->json($profiles, Response::HTTP_OK);

        } catch (QueryException $exception) {
            return response()->json(['status' => 'Error ao encontrar profile'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }       
        

    }

    public function get($id){

        $profile = $this->model->find($id);
        
        try {  
            if(!$profile) {
                return response()->json(['status' => 'Nenhum profile encontrado'], Response::HTTP_NOT_FOUND);
            }
            return response()->json($profile, Response::HTTP_OK);

        } catch (QueryException $exception) {
            return response()->json(['status' => 'Erro ao encontrar profile'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }   

    }

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), Profiles::$rules); 
        
        try {
            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_CREATED);
            }
            $profile = $this->model->create($request->all());
            return response()->json(['status' => 'profile criado com sucesso'], Response::HTTP_CREATED);

        } catch (QueryException $exception) {
            return response()->json(['status' => 'Erro ao criar profile'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 

    }

    public function update($id, Request $request){ 

        $validator = Validator::make($request->all(), Profiles::$rules);
        $profile = $this->model->find($id);

        try {
            if($validator->fails()){
                return response()->json($validator->errors(), Response::HTTP_CREATED);
            }else if($profile){
                $profile = $this->model->find($id)->update($request->all());
                return response()->json(['status' => 'profile alterado com sucesso'], Response:: HTTP_CREATED);            
            }
            return response()->json(['status' => 'profile nao encontrado'], Response:: HTTP_NOT_FOUND);


        } catch (QueryException $exception) {
            return response()->json(['status' => 'Erro ao alterar profile'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 

    }

    public function delete($id){ 

        $profile = $this->model->find($id);  
        
        try {
            if($profile){ 
                
                $profile = $this->model->find($id)->delete();

                return response()->json(['status' => 'profile deletado com sucesso'], Response:: HTTP_CREATED);
            }
            return response()->json(['status' => 'profile nao encontrado'], Response:: HTTP_NOT_FOUND);

        } catch (QueryException $exception) {
            return response()->json(['status' => 'Erro ao deletar profile '], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 
    }
}
