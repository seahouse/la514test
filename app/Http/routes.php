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
    Route::resource('contacts', 'ContactsController');
    Route::resource('custinfos', 'CustinfosController');

    Route::get('api/dropdown', 'Addr\ProvincesController@getIndex');

});

Route::group(['prefix' => 'addr', 'namespace' => 'Addr', 'middleware' => 'auth'], function() {
    Route::resource('addrs', 'AddrsController');
    Route::resource('provinces', 'ProvincesController');
    Route::resource('citys', 'CitysController');
});

Route::group(['prefix' => 'system', 'namespace' => 'System', 'middleware' => 'auth'], function() {
    Route::resource('employees', 'EmployeesController');
    Route::resource('depts', 'DeptsController');
    Route::resource('images', 'ImagesController');
});

Route::group(['prefix' => 'inventory', 'namespace' => 'Inventory', 'middleware' => 'auth'], function() {
    Route::resource('warehouses', 'WarehousesController');
    Route::get('inventoryAvailability', 'InventoryAvailabilityController@listByItems');
    Route::get('inventoryAvailabilityBySalesorder', 'InventoryAvailabilityController@listBySalesorder');
});

Route::group(['prefix' => 'sales', 'namespace' => 'Sales', 'middleware' => 'auth'], function() {
    Route::get('salesorders/{id}/ship', 'SalesordersController@ship');
    Route::resource('salesorders', 'SalesordersController');
    Route::resource('salesreps', 'SalesrepsController');
    Route::resource('terms', 'TermsController');
    Route::get('soitems/{headId}/list', 'SoitemsController@listBySoheadId');
    Route::get('soitems/{headId}/create', 'SoitemsController@createBySoheadId');
    Route::resource('soitems', 'SoitemsController');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::get('/im', function() {
    $img = Image::make('01.jpg')->resize(300,200);
    return $img->response('jpg');
});

