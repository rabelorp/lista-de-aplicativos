<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apps;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class AppsController extends Controller
{
    private $model;

    public function __construct(Apps $apps){

        $this->model = $apps;

    }

    public function getAll(){

        $apps = $this->model->all(); 
        
        try {
            if($apps->isEmpty()) {
                return response()->json(['status'=> 'Nenhum app encontrado'], Response::HTTP_NOT_FOUND);
            }
                return response()->json($apps, Response::HTTP_OK);

        } catch (QueryException $exception) {
            return response()->json(['status' => 'Error ao encontrar app'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }       
        

    }

    public function get($id){

        $app = $this->model->find($id);
        
        try {
            if(!$app) {
                return response()->json(['status' => 'Nenhum app encontrado'], Response::HTTP_NOT_FOUND);
            }
            return response()->json($app, Response::HTTP_OK);
            
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Erro: '.$exception], Response::HTTP_INTERNAL_SERVER_ERROR);
        }   

    }

    public function create(Request $request){
        
        $validator = Validator::make($request->all(), Apps::$rules); 

        try {
            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_CREATED);
            }
            $apps = $this->model->create($request->all());
            return response()->json(['status' => 'app criado com sucesso'], Response::HTTP_CREATED);

        } catch (QueryException $exception) {
            return response()->json(['status' => 'Erro ao criar app'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 

    }

    public function update($id, Request $request){ 

        $validator = Validator::make($request->all(), Apps::$rules);
        $app = $this->model->find($id);

        try {
            if($validator->fails()){
                return response()->json($validator->erros(), Response::HTTP_CREATED);
            }else if($app){
                $app = $this->model->find($id)->update($request->all());
                return response()->json(['status' => 'app alterado com sucesso'], Response:: HTTP_CREATED);            
            }
            return response()->json(['status' => 'app nao encontrado'], Response:: HTTP_CREATED);            


        } catch (QueryException $exception) {
            return response()->json(['status' => 'Erro ao alterar app'], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 

    }

    public function delete($id){ 

        $app = $this->model->find($id);

        try {
            if($app){
                $app = $this->model->find($id)->delete();
                return response()->json(['status' => 'app deletado com sucesso'], Response:: HTTP_CREATED);
            }
            return response()->json(['status' => 'app nao encontrado'], Response:: HTTP_CREATED);


        } catch (QueryException $exception) {
            return response()->json(['status' => 'Erro ao deletar cliente '], Response::HTTP_INTERNAL_SERVER_ERROR);
        } 
    }
}
