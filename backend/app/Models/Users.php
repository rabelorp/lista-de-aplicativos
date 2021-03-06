<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model{
     
    protected $table = 'users';

    protected $fillable = [
        'level',
        'email',
        'password'
    ]; 

    public static $rules = [
        'level' => 'required|max:3',
        'email' => 'required|email|max:45|email:rfc,dns',
        'password' => 'required|max:45'      
    ]; 

    public function setPasswordAttribute($password){
        $this->attributes['password'] = hash::make($password);
    }

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}