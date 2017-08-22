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

//登录
Route::get('/', function () {
    return view('auth.login');
});
Route::auth();
Route::post('/login', 'LoginController@login');
Route::get('/remember', 'LoginController@remember');
Route::get('/logout', 'LoginController@logout');

Route::group(['middleware' => 'guest'], function () {
    //首页
    Route::get('/home', 'HomeController@index');

    //服务器
    Route::post('/serverList', 'ServiceController@serverList');
    Route::get('/server', function () {
        return view('server-list');
    });
    Route::get('/addServer/{id?}', function ($id = null) {
        return view('add-server')->with(['id' => $id]);
    });
    Route::post('/updServer', 'ServiceController@updServer');
    Route::get('/oneServer', 'ServiceController@oneServer');
    Route::get('/delServer', 'ServiceController@delServer');
    Route::get('/getOwnerList', 'ServiceController@getOwnerList');

    //客户
    Route::get('/customer', function () {
        return view('customer-list');
    });
    Route::post('/customerList', 'CustomerController@customerList');
    Route::get('/addCustomer/{id?}', function ($id = null) {
        return view('add-customer')->with(['id' => $id]);
    });
    Route::get('/oneCustomer', 'CustomerController@oneCustomer');
    Route::post('/updCustomer', 'CustomerController@updCustomer');
    Route::get('/delCustomer', 'CustomerController@delCustomer');
});


