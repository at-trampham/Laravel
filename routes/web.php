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
Route::pattern('slug','(.*)');
Route::pattern('id','([0-9]*)');

Route::get('/', function () {
  return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/task', [
  'uses'  =>'TaskController@index',
  'as'  =>'task.index'
  ])->middleware('auth');
Route::get('/task/add', [
  'uses'  =>'TaskController@create',
  'as'  =>'task.create'
  ])->middleware('auth');
Route::post('/task/add', [
  'uses'  =>'TaskController@store',
  'as'  =>'task.create'
  ])->middleware('auth');
Route::get('/task/edit/{id}', [
  'uses'  =>'TaskController@edit',
  'as'  =>'task.edit'
  ])->middleware('auth');
Route::put('/task/edit/{id}', [
  'uses'  =>'TaskController@update',
  'as'  =>'task.edit'
  ])->middleware('auth');
Route::get('/task/destroy/{id}', [
  'uses'  =>'TaskController@destroy',
  'as'  =>'task.destroy'
  ])->middleware('auth');
