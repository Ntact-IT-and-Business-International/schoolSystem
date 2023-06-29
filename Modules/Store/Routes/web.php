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

Route::group(['prefix' => 'store', 'middleware' => ['auth']], function () { 
    Route::get('/food', 'StoreController@food')->name('Food Usage');
    Route::get('/office-of-dos', 'StoreController@Dos')->name('Director Of Studies');
});
