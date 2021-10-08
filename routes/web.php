<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Route::get('/agenda', function () {
    return view('agenda.index');
})->name('agenda');
Route::get('/clients','App\Http\Controllers\ClientController@index')->name('people');
Route::post('/clients','App\Http\Controllers\ClientController@store')->name('client.store');
Route::post('/clients/edit/{id}','App\Http\Controllers\ClientController@update');

Route::get('/associate','App\Http\Controllers\associateController@index')->name('associate');
Route::post('/associate','App\Http\Controllers\associateController@store')->name('associate.store');
Route::post('/associate/edit/{id}','App\Http\Controllers\associateController@update');
Route::get('/associate/delete/{id}','App\Http\Controllers\associateController@delete');
Route::get('/associate/restore/{id}','App\Http\Controllers\associateController@restore');


Route::get('/avocat','App\Http\Controllers\avocatController@index')->name('avocat');
Route::post('/avocat','App\Http\Controllers\avocatController@store')->name('avocat.store');
Route::post('/avocat/edit/{id}','App\Http\Controllers\avocatController@update');
Route::get('/avocat/delete/{id}','App\Http\Controllers\avocatController@delete');
Route::get('/avocat/restore/{id}','App\Http\Controllers\avocatController@restore');



Route::get('/proces', function () {return view('proces.index');} )->name('proces');

//  projet consultatifs
Route::get('/project_const', 'App\Http\Controllers\ProjectController@index' )->name('project');
Route::post('/project_store', 'App\Http\Controllers\ProjectController@store' )->name('project.store');
Route::post('/project/edit/{id}', 'App\Http\Controllers\ProjectController@update' );




Route::get('/publication', function () {return view('publication.index');} )->name('publication');
Route::get('/tempos', function () {return view('tempos.index');} )->name('tempos');
Route::get('/documents', 'App\Http\Controllers\DocumentController@index')->name('documents');
Route::get('/models', 'App\Http\Controllers\ModelController@index')->name('models');


// Recettes
Route::get('/res_office', 'App\Http\Controllers\RecetteController@index')->name('res_office');
Route::post('/res_office', 'App\Http\Controllers\RecetteController@store')->name('recette.store');
Route::post('/res_office/edit/{id}', 'App\Http\Controllers\RecetteController@update' );



Route::get('/frais_office', 'App\Http\Controllers\FraisController@index')->name('frais_office');
Route::post('/frais_office', 'App\Http\Controllers\FraisController@store')->name('frais.store');
Route::post('/frais_office/edit/{id}', 'App\Http\Controllers\FraisController@update');


Route::post('/model', 'App\Http\Controllers\ModelController@store')->name('model.store');
Route::post('/model/edit/{id}', 'App\Http\Controllers\ModelController@update');


