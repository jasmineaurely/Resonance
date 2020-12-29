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

Route::name('team.')->middleware('auth')->prefix('admin/team')->group(function() {
    Route::get('/', 'TeamController@index')->name('index');
    Route::post('/', 'TeamController@index');
    Route::get('/member', 'TeamController@member')->name('member');
    Route::post('/member', 'TeamController@member');
});
