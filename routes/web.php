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

$router->get('/withoutauth', function() {
	return response()->json([
		'message' => 'WOW! without Auth',
	]);
});
$router->post('/auth/login', 'AuthController@postLogin');

$router->group(['middleware' => 'auth:api'], function($router)
{
	$router->get('/withauth', function() {
		return response()->json([
			'message' => 'WOW! with Auth',
		]);
	});
	$router->get('users',  ['uses' => 'UserController@showAllUsers']);

	$router->get('users/{id}', ['uses' => 'UserController@showOneUser']);

	$router->post('users', ['uses' => 'UserController@create']);

	$router->delete('users/{id}', ['uses' => 'UserController@delete']);

	$router->put('users/{id}', ['uses' => 'UserController@update']);	
		
	
});

