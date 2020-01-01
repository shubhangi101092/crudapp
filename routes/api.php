<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('students', 'StudentController@index');
Route::get('students/{id}', 'StudentController@getStudent');
Route::post('students', 'StudentController@create');
Route::put('students/{id}', 'StudentController@updateStudent');
Route::delete('students/{id}','StudentController@destroy');



