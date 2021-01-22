<?php

use App\Models\Entities\Core\Role;
use Illuminate\Support\Facades\Route;


Route::get('/secure/config', ['uses' => 'ConfigController@configure']);
Route::get('/secure/config/migrate-refresh', ['uses' => 'ConfigController@migrateRefresh']);
Route::get('/secure/config/migrate', ['uses' => 'ConfigController@migrate']);
Route::get('/secure/config/db-seed', ['uses' => 'ConfigController@dbSeed']);
Route::get('/secure/config/clear-autoload', ['uses' => 'ConfigController@clearAutoLoad']);
Route::get('/secure/config/config-cache', ['uses' => 'ConfigController@configCache']);
Route::get('/secure/config/cache-clear', ['uses' => 'ConfigController@cacheClear']);
Route::get('/secure/config/key-generate', ['uses' => 'ConfigController@keyGenerate']);
Route::get('/secure/config/optimize', ['uses' => 'ConfigController@optimize']);


Route::get('/', ['uses' => 'Admin\PageController@home'])->middleware('auth');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::group(['namespace' => 'Auth',], function () {

        Route::get('/login', ['as' => 'admin.login', 'uses' => 'LoginController@showLoginForm']);
        Route::post('/login', ['as' => 'admin.login.post', 'uses' => 'LoginController@login']);
        Route::get('/register', ['as' => 'admin.register', 'uses' => 'RegisterController@showRegistrationForm']);
        Route::post('/register', ['as' => 'admin.register.post', 'uses' => 'RegisterController@create']);

        Route::post('logout', ['as' => 'logout', 'uses' => 'LoginController@logout'])->middleware('auth');
    });
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', ['as' => 'admin.index', 'uses' => 'PageController@home']);

        //Country
        Route::get('/countries', ['as' => 'country.index', 'uses' => 'CountryController@index']);
        Route::post('/country/store', ['as' => 'country.store', 'uses' => 'CountryController@store']);

        //City
        Route::get('/cities', ['as' => 'city.index', 'uses' => 'CityController@index']);
        Route::post('/city/store', ['as' => 'city.store', 'uses' => 'CityController@store']);

        //Address
        Route::get('/addresses', ['as' => 'address.index', 'uses' => 'AddressController@index']);
        Route::post('/address/store', ['as' => 'address.store', 'uses' => 'AddressController@store']);

        //Address
        Route::get('/boxes', ['as' => 'box.index', 'uses' => 'BoxController@index']);
        Route::post('/boxes/store', ['as' => 'box.store', 'uses' => 'BoxController@store']);

        //Product
        Route::get('/products', ['as' => 'product.index', 'uses' => 'ProductController@index']);
        Route::post('/products/store', ['as' => 'product.store', 'uses' => 'ProductController@store']);

        //Driver
        Route::get('/drivers', ['as' => 'driver.index', 'uses' => 'DriverController@index']);
        Route::post('/drivers/store', ['as' => 'driver.store', 'uses' => 'DriverController@store']);

        //Company
        Route::get('/companies', ['as' => 'company.index', 'uses' => 'CompanyController@index']);
        Route::post('/company/store', ['as' => 'company.store', 'uses' => 'CompanyController@store']);
    });
});


