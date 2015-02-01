<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('welcome/{name?}', function($name = null) {
   return view('welcome', compact("name"));
});

Route::get('messages/', 'MessageController@index');
Route::get('messages/create/{body}', 'MessageController@create');
Route::get('messages/{id}', 'MessageController@show');