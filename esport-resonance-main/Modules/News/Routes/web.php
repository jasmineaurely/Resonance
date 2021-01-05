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

Route::name('news.')->middleware('auth', 'can:admin')->prefix('admin/news')->group(function() {
    Route::get('/', 'NewsController@index')->name('index');
    Route::post('/', 'NewsController@index');
    Route::get('/category', 'NewsController@category')->name('category');
    Route::post('/category', 'NewsController@category');
});
