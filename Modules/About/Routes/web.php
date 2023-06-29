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

Route::group(['prefix' => 'about', 'middleware' => ['auth']], function () { 
    Route::get('/team', 'AboutController@index')->name('Admin About');
    Route::get('/faq', 'AboutController@faq')->name('Faq');
});
