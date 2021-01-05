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

Route::name('store.')->middleware('auth', 'can:admin')->prefix('admin/store')->group(function() {
    Route::get('/category', 'StoreController@category')->name('category');
    Route::post('/category', 'StoreController@category');
    Route::get('/', 'StoreController@index')->name('index');
    Route::post('/', 'StoreController@index');
    Route::get('/product_category/{product}', 'StoreController@product_category')->name('productcategory');
    Route::post('/product_category/{product}', 'StoreController@product_category');
    Route::get('/product_image/{product}', 'StoreController@product_image')->name('productimage');
    Route::post('/product_image/{product}', 'StoreController@product_image');
});
