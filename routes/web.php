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
//Contact
$router->group(['prefix' => 'contact'], function() use ($router) {
    $router->get('', ['uses' => 'ContactController@getContact']);
    $router->post('create', ['uses' => 'ContactController@create']);
    $router->put('update', ['uses' => 'ContactController@update']);
    $router->delete('delete', ['uses' => 'ContactController@remove']);
});
