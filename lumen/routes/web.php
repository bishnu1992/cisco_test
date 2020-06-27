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



$router->group(['middleware' => 'CustomeAuth'], function () use ($router) {

	Route::get('/','Ajax@index');

	// Route::get('classes','TrainingClass@index');
	// Route::post('classes','TrainingClass@list');
	// Route::post('class','TrainingClass@store');
	// Route::post('class/{id}','TrainingClass@update');
	// Route::delete('class/{id}','TrainingClass@delete');

	// Route::get('categories','Categories@list');
	// Route::post('category','Categories@store');
	// Route::get('trainers','Trainers@list');
	// Route::post('trainer','Trainers@store');
	// Route::get('levels','Levels@list');
	// Route::post('level','Levels@store');

});