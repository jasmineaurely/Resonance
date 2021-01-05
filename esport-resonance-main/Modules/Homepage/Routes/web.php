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

Route::prefix('/')->group(function() {
    Route::get('/', 'HomepageController@index')->name('home');
    Route::get('/match-live', 'HomepageController@live')->name('live');
    Route::get('/schedule', 'HomepageController@schedule')->name('schedule');
    Route::get('/news', 'HomepageController@news')->name('news');
    Route::get('/news/category/{newscategory:slug}', 'HomepageController@news_category')->name('newscategory');
    Route::get('/news/{news:slug}', 'HomepageController@news_read')->name('newsread');

    Route::get('/toko', 'HomepageController@belanja')->name('belanja');
    Route::get('/toko/category/{productcategory:slug}', 'HomepageController@belanja_category')->name('belanja_category');
    Route::get('/toko/product/{product:slug}', 'HomepageController@belanja_product')->name('belanja_product');
    Route::post('/toko/product/{product:slug}', 'HomepageController@belanja_beli')->name('beli')->middleware('auth');
    Route::get('/cart', 'HomepageController@cart')->name('cart')->middleware('auth');
    Route::post('/cart', 'HomepageController@cart_update')->name('cart_update')->middleware('auth');
    Route::get('/cart/{id}/delete', 'HomepageController@cart_hapus')->name('cart_hapus')->middleware('auth');
    Route::get('/checkout', 'HomepageController@checkout')->name('checkout')->middleware('auth');
    Route::post('/checkout', 'HomepageController@checkout_store')->name('checkout_store')->middleware('auth');
});
