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
    return view('accounting');
//     return view('auth/login');
//     return view('welcome');
});
Route::get('/home', function () {
    return view('navbar');
//     return view('welcome');
});
Route::get('/navbar', function () {
    return view('navbar');
});

Route::get('/accounting2', function() {
    return view('accounting2');
});

Route::get('/erp', function() {
    return view('navbarerp');
});

// Route::resource('itemclasses', 'ItemclassesController');
// Route::resource('items', 'ItemsController');
// Route::resource('accountingorder1s', 'Accountingorder1sController');
// Route::resource('boms', 'BomsController');
// Route::get('bomitems/{id}/createitem', 'BomitemsController@createitem');
// Route::resource('bomitems', 'BomitemsController');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('itemclasses', 'ItemclassesController');
    Route::resource('items', 'ItemsController');
    Route::resource('accountingorder1s', 'Accountingorder1sController');
    Route::resource('boms', 'BomsController');
    Route::get('bomitems/{id}/createitem', 'BomitemsController@createitem');
    Route::resource('bomitems', 'BomitemsController');
});

Route::group(['prefix' => 'addr', 'namespace' => 'Addr', 'middleware' => 'auth'], function() {
    Route::resource('addrs', 'AddrsController');
    Route::resource('provinces', 'ProvincesController');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');



