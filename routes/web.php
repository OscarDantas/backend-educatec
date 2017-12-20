<?php

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

$router->group(['prefix' => 'api/v1'], function($router)
{
	/* Router Lei */
    $router->get('lei','LeiController@index');
	$router->get('lei/{id}','LeiController@show');
	$router->post('lei','LeiController@create');
	$router->put('lei/{id}','LeiController@update');
	$router->delete('lei/{id}','LeiController@destroy');

	/* Router Edital */
	$router->get('edital','EditalController@index');
	$router->get('edital/{id}','EditalController@show');
	$router->post('edital','EditalController@create');
	$router->put('edital/{id}','EditalController@update');
	$router->delete('edital/{id}','EditalController@destroy');
});