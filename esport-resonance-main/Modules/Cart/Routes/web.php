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

Route::middleware('auth')->name('mycart.')->group(function() {

    Route::prefix('admin-cart')->middleware('can:admin')->group(function(){
        Route::get('/', 'CartController@admin')->name('admin');
        Route::post('/', 'CartController@admin');
        Route::get('/products/{kode}', 'CartController@adminproducts')->name('adminproducts');
        Route::post('/products/{kode}', 'CartController@adminproducts');
        Route::get('/confirmation', 'CartController@confirmation')->name('confirmation');
        Route::post('/confirmation', 'CartController@confirmation');
        Route::get('/methods', 'CartController@methods')->name('methods');
        Route::post('/methods', 'CartController@methods');
    });

    Route::prefix('my-cart')->middleware('can:member')->group(function(){
        Route::get('/', 'CartController@index')->name('index');
        Route::post('/', 'CartController@index');
        Route::get('/products/{kode}', 'CartController@products')->name('products');
        Route::post('/products/{kode}', 'CartController@products');
        Route::get('/konfirmasi/{productcheckout:kode}', 'CartController@konfirmasi')->name('konfirmasi');
        Route::post('/konfirmasi/{productcheckout:kode}', 'CartController@konfirmasi_store')->name('konfirmasi_store');
    });

});
