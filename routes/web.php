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
})->name('/');



Route::get('/user2','UserController@index2');


Route::get('/user/create','UserController@create');
Route::post('/user','UserController@store');
Route::get('/user/{id}/edit','UserController@edit')->name('user/edit');
Route::put('/user/{id}','UserController@update')->name('user/update');
Route::post('/user/{id}','UserController@destroy')->name('user/delete');
