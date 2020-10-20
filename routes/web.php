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

$router->get('/', function () use ($router) {
    return $router->app->version();
});
// $router->get('/home', function(){
// 	return 'hello';
// });
$router->post('register','AuthController@register');
$router->post('login','AuthController@login');
$router->group(['middleware'=>'login','prefix'=>'admin'], function() use ($router){
    $router->get('user/{id}','UserController@show');
    $router->get('user','UserController@index');
    $router->get('pegawai','Pegawai@index');
    $router->post('pegawai/store','Pegawai@store');
    $router->post('pegawai/show[/{id}]','Pegawai@show');
    $router->put('pegawai/update/{id}','Pegawai@update');
    $router->delete('pegawai/delete/{id}','Pegawai@destroy');    
});
$router->get('menu','Home@index');
$router->post('menu/store','Home@store');