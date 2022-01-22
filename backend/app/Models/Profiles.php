<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model{
     
    protected $table = 'profiles';

    protected $fillable = [
        'id_user',
        'name',
        'cpf',
        'rg',
        'birth' 
    ]; 

    public static $rules = [
        'id_user' => 'required|max:10',
        'name' => 'required|max:45', 
        'cpf' => 'required|max:14' ,
        'rg' => 'required|max:12' ,
        'birth' => 'required|date'          
    ];
    
    // public function transactions(){

    //     return $this->hasMany(Transactions::class, 'id_client','id');
        
    // }
}