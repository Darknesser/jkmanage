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

Route::get('/', function () {
//    dd(\Illuminate\Support\Facades\Auth::user());
    return view('auth.login');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::post('/login', 'LoginController@login');

Route::get('/remember', 'LoginController@remember');

Route::get('/server', 'ServiceController@serverList');

