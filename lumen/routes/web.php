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


	Route::get('/img','RouterController@img');


	Route::get('/','RouterController@index');
	Route::post('routes','RouterController@list');

	Route::post('route','RouterController@store');
	Route::post('route/{id}','RouterController@update');
	Route::delete('route/{id}','RouterController@delete');


$router->group(['middleware' => 'CustomeAuth'], function () use ($router) {

	Route::get('curds','CurdController@index');
	Route::post('curds','CurdController@list');

	Route::post('curd','CurdController@store');
	Route::post('curd/{id}','CurdController@update');
	Route::delete('curd/{id}','CurdController@delete');
});