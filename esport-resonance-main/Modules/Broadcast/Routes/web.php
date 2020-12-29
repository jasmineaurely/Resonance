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

Route::name('broadcast.')->middleware('auth')->prefix('admin/broadcast')->group(function() {
    Route::get('/', 'BroadcastController@index')->name('index');
    Route::post('/', 'BroadcastController@index');
});
