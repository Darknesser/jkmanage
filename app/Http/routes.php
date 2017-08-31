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
    Route::get('/addServer/{cid}/{id?}', function ($cid, $id = null) {
        return view('add-server')->with(['cid' => $cid, 'id' => $id]);
    })->where(['cid' => '[0-9]+', 'id' => '[0-9]+']);
    Route::post('/updServer', 'ServiceController@updServer');
    Route::get('/oneServer', 'ServiceController@oneServer');
    Route::get('/delServer', 'ServiceController@delServer');
    Route::get('/getOwnerList', 'ServiceController@getOwnerList');

    //客户
    Route::get('/customer/{id?}', function ($id = null) {
        return view('customer-list')->with(['id' => $id]);
    })->where('id', '[0-9]+');
    Route::post('/customerList', 'CustomerController@customerList');
    Route::get('/addCustomer/{id?}', function ($id = null) {
        return view('add-customer')->with(['id' => $id]);
    })->where('id', '[0-9]+');
    Route::get('/oneCustomer', 'CustomerController@oneCustomer');
    Route::post('/updCustomer', 'CustomerController@updCustomer');
    Route::get('/delCustomer', 'CustomerController@delCustomer');

    //域名
    Route::get('/domain', function () {
        return view('domain-list');
    });
    Route::get('/addDomain/{cid}/{id?}/{pid?}', 'DomainController@addDomain')
        ->where(['cid' => '[0-9]+', 'id' => '[0-9]+', 'pid' => '[0-9]+']);
    Route::post('/updDomain', 'DomainController@updDomain');
    Route::post('/domainList', 'DomainController@domainList');
    Route::get('/oneDomain', 'DomainController@oneDomain');
    Route::get('/delDomain', 'DomainController@delDomain');
});


