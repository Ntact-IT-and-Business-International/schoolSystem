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

Route::group(['prefix' => 'services', 'middleware' => ['auth']], function () {
    Route::get('/events', 'ServicesController@events')->name('Events');
    Route::get('/service', 'ServicesController@getServices')->name('Service');
    Route::get('/other-services', 'ServicesController@otherServices')->name('Other Services');
});
