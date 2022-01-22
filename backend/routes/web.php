<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/ 

$router->get('/php', function(){
    
    phpinfo();
    exit; 
});


$router->post('/api/auth/login', ['uses' => 'AuthController@login']);   
$router->group(['middleware' => 'protectedRoute', 'prefix' => '/api/auth'], function() use ($router) { 
   $router->post('logout', 'AuthController@logout');
   $router->post('refresh', 'AuthController@refresh');
   $router->post('me', 'AuthController@me');
});  

$router->get('api/profiles', ['middleware' => 'protectedRoute', 'uses' => 'ProfilesController@getall']);  
$router->group(['middleware' => 'protectedRoute','prefix' => '/api/profile'], function() use ($router){
    $router->get('/{id}', 'ProfilesController@get');
    $router->post('/', 'ProfilesController@create');
    $router->put('/{id}', 'ProfilesController@update');
    $router->delete('/{id}', 'ProfilesController@delete');

});  

$router->get('/api/apps', ['middleware' => 'protectedRoute', 'uses' => 'AppsController@getall']);    
$router->group(['middleware' => 'protectedRoute','prefix' => '/api/app'], function() use ($router){
    $router->get('/{id}', 'AppsController@get');
    $router->post('/', 'AppsController@create');
    $router->put('/{id}', 'AppsController@update');
    $router->delete('/{id}', 'AppsController@delete');

});   