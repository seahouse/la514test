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
//     return view('accounting');
//     return view('auth/login');
//     return view('welcome');
    return view('navbarerp');
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

Route::group(['prefix' => 'inventory', 'namespace' => 'Inventory', 'middleware' => 'auth'], function() {
    Route::resource('warehouses', 'WarehousesController');
    Route::get('inventoryAvailability', 'InventoryAvailabilityController@listByItems');
    Route::get('inventoryAvailabilityBySalesorder', 'InventoryAvailabilityController@listBySalesorder');
});

Route::group(['prefix' => 'sales', 'namespace' => 'Sales', 'middleware' => 'auth'], function() {
    Route::get('salesorders/{id}/ship', 'SalesordersController@ship');
    Route::resource('salesorders', 'SalesordersController');
    Route::group(['prefix' => 'salesorders/{salesorder}/receiptpayments'], function () {
        Route::get('/', 'ReceiptpaymentsController@index');
        Route::get('create', 'ReceiptpaymentsController@create');
        Route::post('store', 'ReceiptpaymentsController@store');
        Route::delete('destroy/{receiptpayment}', 'ReceiptpaymentsController@destroy');
    });
    Route::resource('salesreps', 'SalesrepsController');
    Route::resource('terms', 'TermsController');
    Route::get('soitems/{headId}/list', 'SoitemsController@listBySoheadId');
    Route::get('soitems/{headId}/create', 'SoitemsController@createBySoheadId');
    Route::resource('soitems', 'SoitemsController');
});

Route::group(['prefix' => 'purchase', 'namespace' => 'Purchase', 'middleware' => 'auth'], function() {
    Route::resource('vendinfos', 'VendinfosController');
    Route::resource('vendtypes', 'VendtypesController');
    Route::get('purchaseorders/{id}/detail', 'PurchaseordersController@detail');
    Route::get('purchaseorders/{id}/receiving', 'PurchaseordersController@receiving');
    Route::group(['prefix' => 'purchaseorders/{purchaseorder}/payments'], function () {
        Route::get('/', 'PaymentsController@index');
        Route::get('create', 'PaymentsController@create');
        Route::post('store', 'PaymentsController@store');
        Route::delete('destroy/{payment}', 'PaymentsController@destroy');
    });
    Route::resource('purchaseorders', 'PurchaseordersController');
    Route::get('poitems/{headId}/create', 'PoitemsController@createByPoheadId');
    Route::resource('poitems', 'PoitemsController');
});

Route::group(['prefix' => 'accounting', 'namespace' => 'Accounting', 'middleware' => 'auth'], function() {
    Route::resource('receivables', 'ReceivablesController');
});

Route::group(['prefix' => 'system', 'namespace' => 'System', 'middleware' => 'auth'], function() {
    Route::resource('employees', 'EmployeesController');
    Route::resource('depts', 'DeptsController');
    Route::resource('images', 'ImagesController');
    Route::get('users/{id}/editrole', 'UsersController@editrole');
    Route::post('users/{id}/updaterole', 'UsersController@updaterole');
    Route::post('userroles/store', 'UserrolesController@store');
    Route::get('users/{id}/roles/edit', 'UserrolesController@edit');
    Route::resource('users', 'UsersController');
    Route::group(['prefix' => 'users/{user}/roles'], function () {
        Route::get('/', 'UserrolesController@index');
        Route::get('create', 'UserrolesController@create');
        Route::delete('destroy/{role}', 'UserrolesController@destroy');
    });
    Route::resource('roles', 'RolesController');
     Route::resource('permissions', 'PermissionsController');
    Route::group(['prefix' => 'roles/{role}/permissions'], function() {
        Route::get('/', 'RolepermissionsController@index');
        Route::get('create', 'RolepermissionsController@create');
        Route::delete('destroy/{permission}', 'RolepermissionsController@destroy');
    });
    Route::post('rolepermissions/store', 'RolepermissionsController@store');
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

