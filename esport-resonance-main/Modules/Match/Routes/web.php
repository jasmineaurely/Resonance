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

Route::name('match.')->middleware('auth')->prefix('admin/match')->group(function() {
    Route::get('/group', 'MatchController@group')->name('group');
    Route::post('/group', 'MatchController@group');
    Route::get('/round', 'MatchController@round')->name('round');
    Route::post('/round', 'MatchController@round');
    Route::get('/upcoming', 'MatchController@upcoming')->name('upcoming');
    Route::post('/upcoming', 'MatchController@upcoming');
    Route::get('/live', 'MatchController@live')->name('live');
    Route::post('/live', 'MatchController@live');
    Route::get('/', 'MatchController@index')->name('index');
    Route::post('/', 'MatchController@index');
});
