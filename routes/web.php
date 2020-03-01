<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'comumController@index');
	
Route::get('/get-categories', 'CategoriesController@getCategories');
Route::get('/filhos/{id}', 'CategoriesController@filhos');
Route::get('/Comportamento/{id}', 'CategoriesController@novoComportamento')->middleware('auth');
Route::POST('/Comportamento/{id}', 'CategoriesController@gravarComportamento')->middleware('auth');
Route::get('/relatorio', 'CategoriesController@relatorio');
Route::get('/Create', 'CategoriesController@create')->middleware('auth');
Route::POST('/Create', 'CategoriesController@gravar')->middleware('auth');


Route::get('/excluir/{id}', 'CategoriesController@excluirindex')->middleware('auth');
Route::POST('/excluir/{id}', 'CategoriesController@excluir')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
