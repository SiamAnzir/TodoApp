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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewTodos/search','TodoController@search')->name('search');
Route::get('/viewTodos','TodoController@viewTodos')->name('viewTodos');
Route::get('/createTodos','TodoController@createTodos')->name('createTodos');
Route::post('/createTodos','TodoController@addTodos')->name('addTodos');
Route::delete('/deleteTodos{todo}','TodoController@deleteTodos')->name('deleteTodos');
Route::get('/editTodos{todo}','TodoController@editTodos')->name('editTodos');
Route::put('/updateTodos{todo}','TodoController@updateTodos')->name('updateTodos');
Route::get('/markComplete{todo}','TodoController@markComplete')->name('markComplete');
Route::get('/markUndo{todo}','TodoController@markUndo')->name('markUndo');
