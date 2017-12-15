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
Route::group(['prefix'=>'task','middleware'=>'auth'],function(){
Route::get('', [
  'uses'  =>'TaskController@index',
  'as'  =>'task.index'
  ]);
Route::get('add', [
  'uses'  =>'TaskController@create',
  'as'  =>'task.create'
  ]);
Route::post('add', [
  'uses'  =>'TaskController@store',
  'as'  =>'task.create'
  ]);
Route::get('edit/{id}', [
  'uses'  =>'TaskController@edit',
  'as'  =>'task.edit'
  ]);
Route::put('edit/{id}', [
  'uses'  =>'TaskController@update',
  'as'  =>'task.edit'
  ]);
Route::get('destroy/{id}', [
  'uses'  =>'TaskController@destroy',
  'as'  =>'task.destroy'
  ]);
});
