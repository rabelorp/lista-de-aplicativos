<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apps extends Model{
     
    protected $table = 'apps';

    protected $fillable = [
        'id_user',
        'name',
        'bundle-id' 
    ]; 
    
    public static $rules = [ 
        'id_user' => 'required|max:45',
        'name' => 'required|max:45',
        'bundle-id' => 'required|max:45'       
    ];
    
}